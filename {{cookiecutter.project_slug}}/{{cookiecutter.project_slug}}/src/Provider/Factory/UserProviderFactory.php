<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Provider\Factory;

use Psr\Container\ContainerInterface;
use {{ cookiecutter.project_namespace }}\Provider\UserProvider;
use {{ cookiecutter.project_namespace }}\Repository\UserRepository;

class UserProviderFactory {
    public function __invoke(ContainerInterface $container) {
        $userRepository = $container->get(UserRepository::class);
        return new UserProvider($userRepository);
    }
}
