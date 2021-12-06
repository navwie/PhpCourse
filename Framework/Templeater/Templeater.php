<?php

namespace Framework\Templeater;

class Templeater
{
    public function render($title, $view, $params = [])
    {
        ob_start();
        require_once 'view/Templates/' . $view .'.php';
        $content = ob_get_clean();
        require_once 'view/Layouts/mainLayout.php';
    }
}