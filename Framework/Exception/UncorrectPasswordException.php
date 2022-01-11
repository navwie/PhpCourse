<?php

namespace Framework\Exception;

use Exception;

class UncorrectPasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct("Некорректный пароль", 0, null);
    }
}