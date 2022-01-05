<?php
namespace Framework\Exception;


class NoController extends \Exception
{
    public function __construct()
    {
        parent::__construct("Контроллер или экшн не найден ", 0, null);
    }
}