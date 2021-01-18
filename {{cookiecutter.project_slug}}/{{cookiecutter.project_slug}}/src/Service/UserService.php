<?php

namespace {{ cookiecutter.project_namespace }}\Service;

use {{ cookiecutter.project_namespace }}\Repository\UserRepository;

class UserService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }                                                                                                                                                                        
}

