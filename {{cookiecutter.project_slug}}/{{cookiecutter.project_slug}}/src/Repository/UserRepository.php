<?php
declare(strict_types=1);

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

    public function remove(UserModel $user) : Result {
        $delete = new Sql\Delete("user");
        $delete->where([
            "id" => $user->id
        ]);
        return $this->db->execute($delete);
    }

    public function save(UserModel $user) : UserModel {
        $this->db->beginTransaction();

        try {
            if ($user->id) {
                $update = new Sql\Update("user");
                $update->set([
                    "username" => $user->username,
                    "email" => $user->email,
                    "password" => $user->password
                ]);
                $update->where([
                    "id" => $user->id
                ]);
                $updateResult = $this->db->execute($update);
                if ($updateResult->isError()) {
                    throw new Exception("Unable to update user data");
                }
                $id = $user->id;
            } else {
                $insert = new Sql\Insert("user");
                $insert->values([
                    "username" => $user->username,
                    "email" => $user->email,
                    "password" => $user->password
                ]);
                $insertResult = $this->db->execute($insert);
                if ($insertResult->isError()) {
                    throw new Exception("Unable to add new user");
                }

                $id = $insertResult->getGeneratedValue();
            }
            $this->db->commit();

            $select = $this->getUserById(intval($id));
            return $select->getFirstRow(UserModel::class);
        } catch (Exception $e) {
            $this->db->rollback();
            return new UserModel();
        }
    }
}
