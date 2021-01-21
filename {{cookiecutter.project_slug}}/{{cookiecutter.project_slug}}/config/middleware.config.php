<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }};

use Itseasy;

use Slim\Middleware\RoutingMiddleware;
use Slim\Middleware\ErrorMiddleware;

# Order is important
return [
    "middleware" => [
        "middleware" => [
            Itseasy\Csrf\CsrfMiddleware::class,
            Itseasy\Session\SessionMiddleware::class,
            RoutingMiddleware::class,
            Itseasy\Asset\AssetMiddleware::class,
            Itseasy\Http\HttpExceptionMiddleware::class,
            ErrorMiddleware::class,
        ],
    ]
];
