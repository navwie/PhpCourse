<?php

namespace App\Controller;

use Framework\Templeater\Templeater;
use Framework\core\Session;

class MainController
{
    private $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
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
        $e = 'navwie@gmail.com';
        $p = '12345678';
        if($email == $e && $password == $p)
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