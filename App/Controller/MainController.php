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
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($this->authentication->authentication($email, $password))
        {
            $_SESSION['username'] = $email;
            header('Location: /profile');

        }
        else{
            echo 'email non correct, or password';
        }
    }
    public function logOut()
    {
            unset($_SESSION['username']);
            header('Location: /');

    }
}