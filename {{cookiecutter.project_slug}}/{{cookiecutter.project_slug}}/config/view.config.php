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
];


