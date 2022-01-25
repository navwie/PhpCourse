<?php

namespace App\Service;

use App\Entity\User;
use App\Model\UserModel;
use App\Mapper\UserMapper;

class UserService
{
    private UserMapper $userMapper;
    private UserModel $userModel;

    public function __construct()
    {
        $this->userMapper = new UserMapper();
        $this->userModel = new UserModel();
    }

    public function getByField(array $params): array
    {
        return $this->userMapper->mapUser($this->userModel->getByField($params));
    }

    public function getAuthUser($email, $password): ?User
    {
        return $this->userMapper->mapUserToObject($this->userModel->getAuthUser($email, $password));
    }

    public function updateUser(int $userId): void
    {
        $this->userModel->updateUser(
            $userId,
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['password'],
            $_POST['phone'],
        );
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password,
        string $role
    ): void
    {
        $this->userModel->setNewUser(
            $name,
            $surname,
            $email,
            $phone,
            $password,
            $role
        );

    }

    public function setNewProduct($userId, $productId, $amount): void
    {
        $this->userModel->setNewProduct($userId, $productId, $amount);
    }
}
