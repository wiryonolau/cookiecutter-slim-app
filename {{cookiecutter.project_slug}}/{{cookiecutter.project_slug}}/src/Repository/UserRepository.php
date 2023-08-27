<?php

declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Repository;

use Itseasy\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    protected function defineSqlFilter(): void
    {
    }
}