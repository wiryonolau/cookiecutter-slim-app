<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Provider;

use {{ cookiecutter.project_namespace }}\Model\UserModel;
use {{ cookiecutter.project_namespace }}\Repository\UserRepository;
use ArrayIterator;

class UserProvider {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function listUser() : ArrayIterator {
        $result = $this->userRepository->listUser();
        $result->setObject(UserModel::class);
        return $result->getRows();
    }

    public function getUserById(int $id) : UserModel {
        $result = $this->userRepository->getUserById($id);
        $result->setObject(UserModel::class);
        return $result->getFirstRow();
    }
}
