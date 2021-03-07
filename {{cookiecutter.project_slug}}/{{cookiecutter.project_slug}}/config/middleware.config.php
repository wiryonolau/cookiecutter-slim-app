<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }};

use Itseasy;

use Slim\Middleware\BodyParsingMiddleware;
use Slim\Middleware\ErrorMiddleware;
use Slim\Middleware\RoutingMiddleware;

# Order is important
return [
    "middleware" => [
        "middleware" => [
            Itseasy\Csrf\CsrfMiddleware::class,
            Itseasy\Session\SessionMiddleware::class,
            BodyParsingMiddleware::class,
            RoutingMiddleware::class,
            Itseasy\Asset\AssetMiddleware::class,
            Itseasy\Http\HttpExceptionMiddleware::class,
            ErrorMiddleware::class,
        ],
    ]
];
