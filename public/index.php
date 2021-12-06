<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('autoloader.php');

    use Framework\Router;
    use Framework\core\Session;

    $session = new Session();
    $session->start();

    $router = new Router();
    $router->matchRoute();

