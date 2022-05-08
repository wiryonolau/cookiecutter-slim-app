<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }};

return [
    "service" => [
        "factories" => [
            Database::class => Database\Factory\DatabaseFactory::class,
            Provider\UserProvider::class => Provider\Factory\UserProviderFactory::class,
            Repository\UserRepository::class => Repository\Factory\UserRepositoryFactory::class,
            Service\UserService::class => Service\Factory\UserServiceFactory::class,
            View\Renderer\LaminasPhpRenderer::class => View\Renderer\Factory\LaminasPhpRendererFactory::class
        ]
    ],
];
