<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Service\Factory;

use Psr\Container\ContainerInterface;
use {{ cookiecutter.project_namespace }}\Repository\UserRepository;
use {{ cookiecutter.project_namespace }}\Service\UserService;

class UserServiceFactory {
    public function __invoke(ContainerInterface $container) {
        $userRepository = $container->get(UserRepository::class);
        return new UserService($userRepository);
    }
}
