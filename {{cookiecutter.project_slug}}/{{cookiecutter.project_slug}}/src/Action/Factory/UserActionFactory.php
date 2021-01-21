<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Action\Factory;

use Psr\Container\ContainerInterface;
use {{ cookiecutter.project_namespace }}\Action\UserAction;
use {{ cookiecutter.project_namespace }}\Provider\UserProvider;
use {{ cookiecutter.project_namespace }}\Service\UserService;

class UserActionFactory {
    public function __invoke(ContainerInterface $container) {
        $userProvider = $container->get(UserProvider::class);
        $userService = $container->get(UserService::class);
        return new UserAction($userProvider, $userService);
    }
}
