<?php

namespace Framework\Exception;

class NotJewelry extends \Exception
{
    public function __construct()
    {
        parent::__construct("Украшение не найдено ", 0, null);
    }
}