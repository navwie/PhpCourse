<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

use Framework\Core\ErrorHandler;
use Framework\Session\Session;
use Framework\Router\Router;

/*$db = mysqli_connect ("localhost", "lesia_lykhova_db", "1");
mysqli_select_db ($db, 'lesia_lykhova_db');
$result = mysqli_query ($db, "SELECT * FROM user");
$users = mysqli_fetch_all($result);
var_dump($users);*/

$exception = new ErrorHandler();
$exception->register();

$session = new Session();
$session->start();

$router = new Router();
$router->matchRoute();

$session->destroy();
