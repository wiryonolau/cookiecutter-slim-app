<?php
declare(strict_types=1);

namespace {{cookiecutter.project_namespace}}\Model;

use Itseasy\Model\AbstractModel;

class UserModel extends AbstractModel {
    protected $id;
    protected $username;
    protected $email;
    protected $password;
}
