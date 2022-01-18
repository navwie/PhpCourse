<?php

namespace App\Entity;

class Jewelry
{
    private $id;
    private $title;
    private $type_id;
    private $material_id;
    private $price;
    private $description;
    private $image;
    private $discount_id;
    private $amount;

    public function __construct($id, $title, $type_id, $material_id, $price, $description, $image, $discount_id, $amount)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type_id = $type_id;
        $this->material_id = $material_id;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->discount_id = $discount_id;
        $this->amount = $amount;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function getMaterial_id()
    {
        return $this->material_id;
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
}