<?php

namespace App\Repository;

use App\Entity\Jewelry;
use JetBrains\PhpStorm\Pure;

class JewelryMapper
{
    public function mapJewelryToObject($dbData): ?Jewelry
    {
        if (count($dbData) === 0) {
            return null;
        }
        $firstElement = array_shift($dbData);
        return new Jewelry(
            $firstElement['id'],
            $firstElement["title"],
            $firstElement["type_id"],
            $firstElement["material_id"],
            $firstElement["price"],
            $firstElement["description"],
            $firstElement["image"],
            $firstElement["discount_id"],
            $firstElement['amount']
        );
    }
}