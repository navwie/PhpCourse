<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;
use Framework\Templeater\Templeater;
use Framework\core\Session;

class MainController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function main()
    {
        $this->templeater->render('Main', 'main');
    }

}