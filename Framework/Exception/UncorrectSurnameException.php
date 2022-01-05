<?php

namespace Framework\Exception;

use Exception;

class UncorrectSurnameException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректная фамилия", 0, null);
    }
}