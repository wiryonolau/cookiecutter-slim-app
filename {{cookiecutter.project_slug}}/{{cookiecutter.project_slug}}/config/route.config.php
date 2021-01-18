<?php

namespace {{ cookiecutter.project_namespace }}\Action;

return [
    "routes" => [
        [
            "route" => "/",
            "options" => [
                "action" => DashboardAction::class
            ]
        ],
    ],
];

