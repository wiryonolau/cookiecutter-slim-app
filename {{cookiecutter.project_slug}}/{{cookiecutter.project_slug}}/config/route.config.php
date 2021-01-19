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
        [
            "route" => "/user",
            "options" => [
                "redirect" => "/user/list",
            ],
            "child_routes" => [
                [
                    "route" => "/{id:[0-9]+}",
                    "method" => ["GET", "POST"],
                    "options" => [
                        "action" => UserAction::class
                    ]
                ],
                [
                    "route" => "/list",
                    "options" => [
                        "action" => UserAction::class
                    ]
                ]
            ]
        ]
    ],
];
