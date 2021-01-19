<?php

namespace {{cookiecutter.project_namespace}}\Model;

class UserModel {
    protected $id;
    protected $username;
    protected $email;
    protected $password;

    public function __set(string $name, $value) {
        $this->{$name} = $value;
    }

    public function __get(string $name) {
        return $this->{$name};
    }

    public function setData(array $data = []) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
