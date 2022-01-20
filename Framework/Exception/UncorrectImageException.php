<?php

namespace Framework\Exception;

class UncorrectImageException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Некорректное заполнение поля 'картинка'", 0, null);
    }
}