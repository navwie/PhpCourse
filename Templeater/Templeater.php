<?php

class Templeater
{
    public function render($title, $view, $params = [])
    {
        ob_start();
        require_once 'templates/' . $view .'.php';
        $content = ob_get_clean();
        require_once 'layouts/mainLayout.php';
    }
}