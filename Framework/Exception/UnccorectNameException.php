<?php

namespace Framework\Exception;

use Exception;

class UnccorectNameException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректное имя", 0, null);
    }
}