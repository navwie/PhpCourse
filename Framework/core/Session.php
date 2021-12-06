<?php

namespace Framework\core;

class Session
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function start()
    {
        if(!self::isSessionExist())
        {
            return session_start();
        }
        return false;
    }

    public function destroy()
    {
        if(self::isSessionExist()){
            return session_destroy();
        }
        return false;
    }

    public function set($key, $value)
    {
        if(self::isSessionExist())
        {
            $_SESSION[$key] = $value;
        }
    }

    public function get($key)
    {
        if(self::isSessionExist() && self::isKeyExist($key))
        {
            return $_SESSION[$key];
        }
        return false;
    }

    public function deleteKey($key)
    {
        if(self::isKeyExist($key) && self::isSessionExist())
        {
            unset($_SESSION[$key]);
        }
    }

    public function setName($name)
    {
        if(self::isSessionExist())
        {
            session_name($name);
        }
    }

    public function getName()
    {
        if(self::isSessionExist())
        {
           return session_name();
        }
        return null;
    }

    public function setId($id)
    {
        if(self::isSessionExist())
        {
            session_id($id);
        }
    }

    public function getId()
    {
        if(self::isSessionExist())
        {
            return session_id();
        }
        return null;
    }

    public function isKeyExist($key)
    {
        return isset($_SESSION[$key]);
    }

    public function isSessionExist()
    {
        return !empty($_SESSION);
    }
}