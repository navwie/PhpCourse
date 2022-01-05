<?php

namespace Framework\Exception;

use Exception;

class UncorrectPhoneException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректный номер телефона", 0, null);
    }
}