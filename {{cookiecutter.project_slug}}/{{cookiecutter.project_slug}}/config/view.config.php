<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }};

use DI;

return [
    "view" => [
        "class" => View\LaminasView::class,
        "renderer" => View\Renderer\LaminasPhpRenderer::class,
        "template_path" => __DIR__."/../view/",
    ],
    "asset" => [
        "resolver_configs" => [
            "paths" => [
                __DIR__."/../asset/",
                __DIR__."/../node_modules/"
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
