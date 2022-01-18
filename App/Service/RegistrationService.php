<?php

namespace App\Service;


use Framework\Exception\UnccorectNameException;
use Framework\Exception\UncorrectEmailException;
use Framework\Exception\UncorrectPasswordException;
use Framework\Exception\UncorrectPhoneException;
use Framework\Exception\UncorrectSurnameException;
use Framework\Validator\Validator;
use App\Service\UserService;

class RegistrationService
{
    private Validator $validator;
    private UserService $userService;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->userService = new UserService();
    }


    public function register(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password,
        string $role

    ): bool
    {
        try {
            $this->validator->onRegistrationUser(
                $name,
                $surname,
                $email,
                $phone,
                $password
            );
        } catch (
        UnccorectNameException
        |UncorrectSurnameException
        |UncorrectEmailException
        |UncorrectPhoneException
        |UncorrectPasswordException $e
        ) {
            $this->validator->setRegistrationError($e);
            return false;
        }
        $this->userService->setNewUser(
            $name,
            $surname,
            $email,
            $phone,
            $password,
            $role
        );
        return true;
    }
}