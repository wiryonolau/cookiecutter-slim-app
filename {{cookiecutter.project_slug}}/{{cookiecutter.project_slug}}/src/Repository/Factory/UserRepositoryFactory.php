<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Repository\Factory;

use Psr\Container\ContainerInterface;
use {{ cookiecutter.project_namespace }}\Database;
use {{ cookiecutter.project_namespace }}\Repository\UserRepository;

class UserRepositoryFactory {
    public function __invoke(ContainerInterface $container) {
        $db = $container->get(Database::class);
        return new UserRepository($db, "user");
    }
}
