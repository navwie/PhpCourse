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
        $this->templeater->renderUser('Profile', 'profile');

    }

    public function loginService()
    {

        match($this->authentication->authentication($_POST["email"], $_POST["password"])) {

            'admin' => header('location: /admin'),
            'user' => header('location: /profile'),
            null => header("location: /login")
        };
    }

    public function logOut()
    {
        unset($_SESSION['username']);
        header('Location: /');

    }
}