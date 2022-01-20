<?php

namespace App\Mapper;

use App\Entity\User;

class UserMapper
{
    public function mapUser($dbData): array
    {

        $users = [];
        foreach ($dbData as $firstElement) {
            $users[] = new User(
                $firstElement['id'],
                $firstElement["name"],
                $firstElement["surname"],
                $firstElement["phone"],
                $firstElement["email"],
                $firstElement["password"],
                $firstElement["role"]
            );
        }
        return $users;
    }

    public function mapUserToObject($dbData): ?User
    {
        if (count($dbData) === 0) {
            return null;
        }
        $firstElement = array_shift($dbData);
        return new User(
            $firstElement['id'],
            $firstElement["name"],
            $firstElement["surname"],
            $firstElement["phone"],
            $firstElement["email"],
            $firstElement["password"],
            $firstElement["role"]
        );
    }
}
