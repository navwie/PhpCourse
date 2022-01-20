<?php

namespace Framework\Exception;

class UncorrectPriceException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректное заполнение поля 'цена'", 0, null);
    }
}