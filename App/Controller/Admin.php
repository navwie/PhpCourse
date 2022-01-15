<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $this->templeater->renderAdmin('Admin', 'admin');
    }

    public function addProduct()
    {
        $this->templeater->renderAdmin('add-product', 'add-product');
    }
}