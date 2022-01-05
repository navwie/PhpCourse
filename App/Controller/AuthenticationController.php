<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;
use Framework\Database\Db;

class AuthenticationController extends BaseController
{
    public function login()
    {
        $this->templeater->render('Login', 'login');
    }

    public function profile()
    {
        $this->templeater->render('Profile', 'profile');
    }

    public function loginService()
    {

        if ($this->authentication->authentication($_POST["email"], $_POST["password"])) {
            header('Location: /profile');

        } else {
            header('Location: /login');
        }
    }

    public function logOut()
    {
        unset($_SESSION['username']);
        header('Location: /');

    }
}