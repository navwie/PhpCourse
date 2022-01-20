<?php

namespace App\Entity;

class Jewelry
{
    private $id;
    private $title;
    private $type;
    private $material;
    private $price;
    private $description;
    private $image;
    private $discount_id;
    private $amount;
    private $sex;

    public function __construct($id, $title, $type, $material, $price, $description, $image, $discount_id, $amount, $sex)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->material = $material;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->discount_id = $discount_id;
        $this->amount = $amount;
        $this->sex = $sex;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscountId()
    {
        return $this->discount_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getSex()
    {
        return $this->sex;
    }
}