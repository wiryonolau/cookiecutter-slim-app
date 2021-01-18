<?php

namespace {{ cookiecutter.project_namespace }}\Repository;

use {{ cookiecutter.project_namespace }}\Model\UserModel;
use Exception;
use Itseasy\Database\Database;
use Itseasy\Database\Result;
use Laminas\Db\Sql;

class UserRepository {
    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function listUser() : Result {
        $select = new Sql\Select("user");
        return $this->db->execute($select);
    }

    public function getUserById(int $id) : Result {
        $select = new Sql\Select("user");
        $select->where([
            "id" => $id
        ]);
        return $this->db->execute($select);
    }

    public function save(UserModel $user) : Result {
        $this->db->beginTransaction();

        try {
            $selectResult = $this->getUserById($user->id);
            if ($selectResult->isEmpty()) {
                $insert = new Sql\Insert("user");
                $insert->values([
                    "username" => $user->username,
                    "password" => $user->password
                ]);
                $insertResult = $this->db->execute($insert);
                if ($insertResult->isError()) {
                    throw new Exception("Unable to add new user");
                }
            } else {
                $update = new Sql\Update("user");
                $update->values([
                    "username" => $user->username,
                    "password" => $user->password
                ]);
                $update->where([
                    "id" => $user->id
                ]);
                $updateResult = $this->db->execute($update);
                if ($updateResult->isError()) {
                    throw new Exception("Unable to update user data");
                }
            }
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollback();
        }
    }
}
