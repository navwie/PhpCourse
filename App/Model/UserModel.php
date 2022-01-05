<?php

namespace App\Model;

use Framework\Exception\NotUser;
use PDOException;
use Framework\Core\AbstractModel\Model;

class UserModel extends Model
{
    public function getAllUsers(): bool|array
    {
        $query ='SELECT * FROM `user`';
        $result = $this->dbConnect->prepare($query);

        $result->execute();
        $users = $result->fetchAll();
        return $users;
    }

    public function getAuthUser($email, $password)
    {
        $query ="SELECT * FROM `user` WHERE email = '$email' AND password = '$password' ";
        $result = $this->dbConnect->prepare($query);

        $result->execute();
        $users = $result->fetchAll();
        return $users;
    }

    public function getByField(array $params, string $role): ?array
    {
        try {
            $query ='
                SELECT * 
                FROM `user`
                ';
            $result = $this->dbConnect->prepare($query);

            $result->execute();
            $users = $result->fetchAll();
            $result->debugDumpParams();


        } catch (PDOException $e) {
            throw new $e();
        }
        return $users;
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password,
        string $role = '0'
    ): void {
        try {
            $query = $this->dbConnect->prepare('
                INSERT 
                INTO `user`
                (name, surname, email, password, role, phone) 
                VALUES (:name, :surname, :email, :password, :role, :phone) ');

            $query->execute([
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':password' => $password,
                ':role' => $role,
                ':phone' => $phone
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

}
