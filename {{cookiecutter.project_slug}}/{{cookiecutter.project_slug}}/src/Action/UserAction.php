<?php

namespace {{ cookiecutter.project_namespace }}\Action;

use {{ cookiecutter.project_namespace }}\Model\UserModel;
use {{ cookiecutter.project_namespace }}\Provider\UserProvider;
use {{ cookiecutter.project_namespace }}\Service\UserService;
use Itseasy\Action\InvokableAction;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpForbiddenException;

class UserAction extends InvokableAction {
    protected $userProvider;
    protected $userService;

    public function __construct(UserProvider $userProvider, UserService $userService) {
        $this->userProvider = $userProvider;
        $this->userService = $userService;
    }

    public function httpGet() : ResponseInterface {
        $user_id = $this->getArgument("id", null);

        if (is_null($user_id)) {
            $createUser = $this->getQuery("create", false);

            if ($createUser) {
                return $this->render("user/form", [
                    "layout" => [
                        "content_title" => "Add New User"
                    ],
                ]);
            }

            $users = $this->userProvider->listUser();
            return $this->render("user/list", [
                "layout" => [
                    "content_title" => "User List"
                ],
                "users" => $users
            ]);
        }

        $user = $this->userProvider->getUserById($user_id);
        if (!$user->id) {
            throw new HttpForbiddenException($this->request, 403);
        }
        return $this->render("user/form", [
            "layout" => [
                "content_title" => "Edit User"
            ],
            "user" => $user
        ]);
    }

    public function httpPost() : ResponseInterface {
        $data = (array)$this->request->getParsedBody();
        $user = new UserModel();

        $user->setData($data);
        $user = $this->userService->save($user);

        if (!$user->id) {
            $this->view->flash()->set("warning", "Unable to save user data");
            return $this->render("user/form", [
                "layout" => [
                    "content_title" =>  "Edit User"
                ],
            ]);
        }

        $this->view->flash()->set("success", "Data Updated");
        $redirect_url = $this->view->url(sprintf("/user/%d", $user->id));
        return $this->response->withHeader("Location", $redirect_url);
    }
}
