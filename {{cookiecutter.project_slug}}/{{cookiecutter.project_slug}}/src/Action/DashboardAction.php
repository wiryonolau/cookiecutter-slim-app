<?php

namespace {{ cookiecutter.project_namespace }}\Action;

use Itseasy\Action\BaseAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DashboardAction extends BaseAction {
    protected $userProvider;

    public function __construct($userProvider) {
        $this->userProvider = $userProvider;
    }

    public function __invoke(Request $request, Response $response) : Response {
        $users = $this->userProvider->listUser();

        return $this->view->render($response, "dashboard/dashboard", [
            "layout" => [
                "title" => "{{ cookiecutter.project_name }}",
                "content_title" => "Dashboard"
            ],
            "message" => "This is dashboard area",
            "users" => $users
        ]);
    }
}
