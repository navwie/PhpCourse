<?php

namespace Framework\Core\Authentication;

class Authentication
{
    private string $email = 'navwie@gmail.com';
    private string $password = '12345678';

    public function authentication(string $login, string $password): bool
    {
        if ($this->email == $login && $this->password == $password) {
            return true;
        }
        return false;
    }
}
