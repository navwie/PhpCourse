<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

use Framework\core\ErrorHandler;
use Framework\Router;
use Framework\core\Session;

$exception = new ErrorHandler();
$exception->register();

$session = new Session();
$session->start();

$router = new Router();
$router->matchRoute();
