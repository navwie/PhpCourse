<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

use Framework\Core\ErrorHandler;
use Framework\Router;
use Framework\Core\Session;

$exception = new ErrorHandler();
$exception->register();

$session = new Session();
$session->start();

$router = new Router();
$router->matchRoute();
