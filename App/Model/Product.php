<?php

namespace App\Model;

class Product
{
    private int $id;
    private string $name;
    private string $img;
    private int $price;

    /**
     * @param int $id
     * @param string $name
     * @param string $img
     * @param int $price
     */
    public function __construct(int $id, string $name, string $img, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }




}