<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Action;

use Itseasy\Action\InvokableAction;
use Psr\Http\Message\ResponseInterface as Response;

class DashboardAction extends InvokableAction {

    public function httpGet() : Response {
        return $this->render("dashboard/dashboard", [
            "layout" => [
                "title" => "{{ cookiecutter.project_name }}",
                "content_title" => "Dashboard"
            ],
            "message" => "This is dashboard area",
        ]);
    }
}
