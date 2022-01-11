<?php

namespace Framework\Validator;

use Framework\Exception\UnccorectNameException;
use Framework\Exception\UncorrectSurnameException;
use Framework\Exception\UncorrectEmailException;
use Framework\Exception\UncorrectPhoneException;
use Framework\Exception\UncorrectPasswordException;
use Framework\Session\Session;

class Validator
{
    private const NAME_REGEX = '/\w{3,}/';
    private const EMAIL_REGEX = '/\w+@\w+\.\w+/';
    private const PHONE_REGEX = '/\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d/';
    private const PASSWORD_REGEX = '/[a-zA-Z0-9]/';
    private Session $session;

    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * @throws UncorrectPasswordException
     * @throws UncorrectPhoneException
     * @throws UncorrectEmailException
     * @throws UnccorectNameException
     * @throws UncorrectSurnameException
     */
    public function onRegistrationUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $password,
    ): void {
        switch (true) {
            case preg_match(self::NAME_REGEX, $name) !== 1:
                throw new UnccorectNameException();

            case preg_match(self::NAME_REGEX, $surname) !== 1:
                throw new UncorrectSurnameException();

            case preg_match(self::EMAIL_REGEX, $email) !== 1:
                throw new UncorrectEmailException();

            case preg_match(self::PHONE_REGEX, $phone) !== 1:
                throw new UncorrectPhoneException();

            case preg_match(self::PASSWORD_REGEX, $password) !== 1:
                throw new UncorrectPasswordException();

        }
    }

    public function setLoginError(): void
    {
        $this->session->set(
            "wrongCredentials",
            '<div class="alert alert-danger" role="alert">
                <b>Неправильные учетные данные</b>
            </div>'
        );
    }

    public function setAdminLoginError(): void
    {
        $this->session->set(
            "adminWrongCredentials",
            '<div class="alert alert-danger" role="alert">
                <b>Неправильные учетные данные</b>
            </div>'
        );
    }
    public function setRegistrationError(\Exception $exception): void
    {
        $this->session->set(
            "registrationError",
            "<div class='alert alert-danger' role='alert'>
                <b>{$exception->getMessage()}</b>
            </div>"
        );
    }

}
