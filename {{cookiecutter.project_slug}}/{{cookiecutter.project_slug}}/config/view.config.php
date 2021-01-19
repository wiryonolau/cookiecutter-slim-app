<?php

namespace {{ cookiecutter.project_namespace }};

use DI;

return [
    "view" => [
        "template_path" => __DIR__."/../view/",
    ],
    "asset" => [
        "resolver_configs" => [
            "paths" => [
                __DIR__."/../asset/"
            ]
        ]
    ],
    "view_helpers" => [
        "aliases" => [
            "navigation" => View\Helper\NavigationHelper::class,
        ],
        "factories" => [
            View\Helper\NavigationHelper::class => View\Helper\Factory\NavigationHelperFactory::class,
        ]
    ]
];
