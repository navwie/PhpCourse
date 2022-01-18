<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

use Framework\Core\ErrorHandler;
use Framework\Session\Session;
use Framework\Router\Router;

$session = new Session();
$session->set('userId', 1);
$session->start();

$exception = new ErrorHandler();
$exception->register();

$router = new Router();
$router->matchRoute();

