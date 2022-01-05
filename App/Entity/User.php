<?php

namespace App\Entity;

class User
{
    private $id;
    private $name;
    private $surname;
    private $phone;
    private $email;
    private $password;
    private $role;

    public function __construct($id, $name, $surname, $phone, $email, $password, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

}