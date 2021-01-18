<?php

namespace {{cookiecutter.project_namespace}}\Model;

class UserModel {
    protected $username;
    protected $email;
    protected $password;

    public function __set($name, $value) {
        $this->{$name} = $value;
    }

    public function __get($name) {
        return $this->{$name};
    }
}
