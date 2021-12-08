<?php

namespace Framework;

class Router
{
    private static array $routes;   # array of routes
    private static array $route = [];  # current route

    public function __construct()
    {
        $routes = require_once("../Framework/Config/routes.php");
        self::$routes = $routes;
    }

    public function routeCheck($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#", $url, $result)) {
                foreach ($result as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public function matchRoute()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($this->routeCheck($this->removeQueryString($url))) {
            $controller = ucfirst(self::$route['controller']) . "Controller";
            $act = self::$route['action'];
            $str = "App\\Controller\\$controller";
            if (class_exists($str)) {
                $object = new $str($url);
                $object->$act();
            }
        }
        return $url;
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