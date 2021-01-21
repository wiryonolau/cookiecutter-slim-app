<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Action;

use DI;

return [
    "action" => [
        "factories" => [
            DashboardAction::class => DI\create(),
            UserAction::class => Factory\UserActionFactory::class
        ],
    ]
];
