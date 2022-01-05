<?php

namespace Framework\Core\BaseController;

use Framework\Core\Authentication\Authentication;
use Framework\Templeater\Templeater;

abstract class BaseController
{
    protected Templeater $templeater;
    protected Authentication $authentication;

    public function __construct()
    {
        $this->templeater = new Templeater();
        $this->authentication = new Authentication();
    }
}