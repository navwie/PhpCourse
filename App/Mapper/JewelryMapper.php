<?php

namespace App\Mapper;

use App\Entity\Jewelry;
use App\Model\JewelryModel;

class JewelryMapper
{
    public function mapJewelryToObject($dbData): ?Jewelry
    {
        if (count($dbData) === 0) {
            return null;
        }
        $firstElement = array_shift($dbData);
        $jewelryModel = new JewelryModel();

        $jewelry = new Jewelry(
            $firstElement['id'],
            $firstElement["title"],
            $jewelryModel->getTypeNameByTypeId($firstElement["type_id"]),
            $jewelryModel->getMaterialNameByMaterialId($firstElement["material_id"]),
            $firstElement["price"],
            $firstElement["description"],
            $firstElement["image"],
            $firstElement["discount_id"],
            $firstElement['amount'],
            $jewelryModel->getSexNameByTypeId($firstElement["sex_id"]),
        );

        return $jewelry;
    }

    public function mapJewelry(array $dbData): array
    {
        $jewelryModel = new JewelryModel();
        $jewelries = [];
        foreach ($dbData as $firstElement) {
            $jewelries[] = new Jewelry(
                $firstElement['id'],
                $firstElement["title"],
                $jewelryModel->getTypeNameByTypeId($firstElement["type_id"]),
                $jewelryModel->getMaterialNameByMaterialId($firstElement["material_id"]),
                $firstElement["price"],
                $firstElement["description"],
                $firstElement["image"],
                $firstElement["discount_id"],
                $firstElement['amount'],
                $jewelryModel->getSexNameByTypeId($firstElement["sex_id"]),
            );
        }
        return $jewelries;
    }
}