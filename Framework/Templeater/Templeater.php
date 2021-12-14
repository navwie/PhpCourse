<?php

namespace Framework\Templeater;

class Templeater
{
    public function render($title, $view, $params = [])
    {
        ob_start();
        require_once '../App/View/Templates/' . $view . '.php';
        $content = ob_get_clean();
        require_once '../App/View/Layouts/mainLayout.php';
    }
}