<?php

namespace {{ cookiecutter.project_namespace }}\Console\Command;

use DI;

return [
    "console" => [
        "commands" => [
            ExampleCommand::class,
        ],
        "factories" => [
            ExampleCommand::class => DI\create()
        ]
    ]
];
