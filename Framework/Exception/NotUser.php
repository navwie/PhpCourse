<?php

namespace Framework\Exception;

class NotUser  extends  \Exception
{
    public function __construct()
{
    parent::__construct("Нет такого пользователя ", 0, null);
}
}