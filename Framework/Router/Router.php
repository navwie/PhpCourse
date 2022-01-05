<?php

namespace Framework\Router;

use Framework\Exception\NoController;

class Router
{
    private array $routes;   # array of routes
    private array $route = [];  # current route

    public function __construct()
    {
        $routes = require_once("../Framework/Config/routes.php");
        $this->routes = $routes;
    }

    public function routeCheck($url)
    {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match("#$pattern#", $url, $result)) {
                foreach ($result as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                $this->route = $route;
                return true;
            }
        }
        return false;
    }

    public function matchRoute()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($this->routeCheck($this->removeQueryString($url))) {
            $controller = ucfirst($this->route['controller']) . "Controller";
            $act = $this->route['action'];
            $str = "App\\Controller\\$controller";
            if (class_exists($str)) {
                $object = new $str($url);
                $object->$act();
            }else{
                throw new NoController();
            }
        }
    }

    public function removeQueryString($uri)
    {
        if ($uri) {
            $parts = explode('?', $uri);
            if (strpos($parts['0'], "=") === false) {
                return trim($parts['0'], '/');
            } else {
                return '';
            }
        } else return false;
    }

}