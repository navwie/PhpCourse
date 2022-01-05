<?php

namespace App\Model;

use Framework\Exception\NotUser;
use PDOException;
use Framework\Core\AbstractModel\Model;

class JewelryModel extends Model
{
    public function setNewJewelry(
        $title,
        $type_id,
        $material_id,
        $price,
        $description,
        $image,
        $discount_id,
        $amount
    ): void
    {
        try {
            $result = $this->dbConnect->prepare("
                INSERT 
                INTO `product`
                (title, type_id, material_id, price, description, image, discount_id, amount)
                VALUES 
                (:title, :type_id, :material_id, :price, :description, :image, :discount_id, :amount) 
            ");
            $result->execute([
                ":title" => $title,
                ":type_id" => $type_id,
                ":material_id" => $material_id,
                ":price" => $price,
                ":desctiption" => $description,
                ':image' => $image,
                ":discount_id" => $discount_id,
                ":amount" => $amount,
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }
}