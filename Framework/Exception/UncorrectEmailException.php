<?php

namespace Framework\Exception;

use Exception;

class UncorrectEmailException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректная почта", 0, null);
    }
}