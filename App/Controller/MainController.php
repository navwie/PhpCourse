<?php


class MainController
{
    private $templeater;
    public function __construct()
    {
        require_once '../Templeater/Templeater.php';
        $this->templeater = new Templeater();
    }

    public function main()
    {
        $this->templeater->render('Main', 'main');
        var_dump('main');
    }

    public function login()
    {
        $this->templeater->render('Login', 'login');
    }

    public function loginService()
    {
        Session::start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $e = 'navwie@gmail.com';
        $p = '12345678';
        if($email == $e && $password == $p)
        {
            Session::set('username', $email);
            header('Location: /main');

        }
        else{
            echo 'email non correct, or password';
        }
    }
}