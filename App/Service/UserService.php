<?php

namespace App\Service;

use App\Entity\User;
use App\Model\UserModel;
use App\Repository\UserMapper;

class UserService
{
    private UserMapper $userMapper;
    private UserModel $userModel;

    public function __construct()
    {
        $this->userMapper = new UserMapper();
        $this->userModel = new UserModel();
    }

    public function getByField(array $params, $role = 0): array
    {
        return $this->userMapper->mapUser($this->userModel->getByField($params, $role));
    }

    public function getAuthUser($email, $password): ?User
    {
        return $this->userMapper->mapUserToObject($this->userModel->getAuthUser($email, $password));
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password
    ): void
    {
        $this->userModel->setNewUser(
            $name,
            $surname,
            $email,
            $phone,
            $password
        );

    }
}
