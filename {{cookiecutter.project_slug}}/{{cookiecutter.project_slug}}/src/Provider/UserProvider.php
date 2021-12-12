<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Provider;

use {{ cookiecutter.project_namespace }}\Model\UserModel;
use {{ cookiecutter.project_namespace }}\Repository\UserRepository;
use Itseasy\Model\CollectionModel;
use Traversable;

class UserProvider {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function listUser() : Traversable {
        $result = $this->userRepository->listUser();
        return $result->getRows(new CollectionModel(new UserModel()));
    }

    public function getUserById(int $id) : UserModel {
        $result = $this->userRepository->getUserById($id);
        return $result->getFirstRow(UserModel::class);
    }
}
