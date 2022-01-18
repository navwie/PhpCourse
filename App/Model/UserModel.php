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

    public function getByField(array $params): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `user`
                WHERE ';

            $i = 0;
            foreach ($params as $field => $value) {
                if ($i === 0) {
                    $query .= $field .  " = " . "'$value'" . " ";
                } else {
                    $query .= " AND " . $field .  " = " . "'$value'";
                }
                $i++;
            }
            $result = $this->dbConnect->prepare($query);
            $result->execute();
            $users = $result->fetchAll();
        } catch (PDOException $e) {
            throw new $e();
        }
        return $users;
    }

    public function updateUser(
        $id,
        $name,
        $surname,
        $email,
        $password,
        $phone,
    ): void {
        try {
            $result = $this->dbConnect->prepare("
                UPDATE `user`
                SET 
                    name = :name,
                    surname = :surname,
                    email = :email,
                    password = :password,                    
                    phone = :phone
                WHERE 
                      id = :id 
            ");
            $result->execute([
                ':id' => $id,
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':password' => $password,
                ':phone' => $phone,

            ]);

        } catch (PDOException $e) {

            throw new $e();
        }
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password,
        string $role
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
            var_dump($query);
            throw new $e();
        }
    }

}
