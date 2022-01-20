<?php

namespace Framework\Exception;

use Exception;

class UncorrectAmountException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректное заполнение поля 'количество'", 0, null);
    }
}