<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Action;

use Itseasy\Action\BaseAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DashboardAction extends BaseAction {

    public function __invoke(Request $request, Response $response) : Response {
        return $this->view->render($response, "dashboard/dashboard", [
            "layout" => [
                "title" => "{{ cookiecutter.project_name }}",
                "content_title" => "Dashboard"
            ],
            "message" => "This is dashboard area",
        ]);
    }
}
