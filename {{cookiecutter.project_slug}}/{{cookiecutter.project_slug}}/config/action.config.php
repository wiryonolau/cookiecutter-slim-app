<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Action;

use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    "action" => [
        "factories" => [
            DashboardAction::class => InvokableFactory::class,
            UserAction::class => Factory\UserActionFactory::class
        ],
    ]
];
