<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('autoloader.php');
    require_once '../Templeater/Templeater.php';
    $templeater = new Templeater();
    $templeater->render('main' , 'main');
?>
