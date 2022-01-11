<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;

class UserController extends BaseController
{
    public function changeDataUser()
    {
        $this->templeater->renderUser('change-data-user', 'change-data-user');
    }

    public function addProduct()
    {
        $this->templeater->renderUser('add-product', 'add-product');
    }

    public function changeUser(){

    }
}