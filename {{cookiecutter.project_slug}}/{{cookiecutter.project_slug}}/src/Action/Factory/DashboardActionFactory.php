<?php

namespace {{ cookiecutter.project_namespace }}\Action\Factory;

use Psr\Container\ContainerInterface;
use {{ cookiecutter.project_namespace }}\Action\DashboardAction;
use {{ cookiecutter.project_namespace }}\Provider\UserProvider;

class DashboardActionFactory {
    public function __invoke(ContainerInterface $container) {
        $userProvider = $container->get(UserProvider::class);
        return new DashboardAction($userProvider);
    }                                                                                                                                                                        
}

