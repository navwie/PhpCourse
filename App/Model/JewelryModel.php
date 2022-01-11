<?php

namespace App\Model;

use Framework\Exception\NotUser;
use PDOException;
use Framework\Core\AbstractModel\Model;

class JewelryModel extends Model
{
    public function createJewelry(
        $title,
        $type_id,
        $material_id,
        $price,
        $description,
        $image,
        $amount
    ): void
    {
        try {
            $result = $this->dbConnect->prepare("
                INSERT 
                INTO `jewelry`
                (title, type_id, material_id, price, description, image, amount)
                VALUES 
                (:title, :type_id, :material_id, :price, :description, :image,:amount) 
            ");
            $result->execute([
                ":title" => $title,
                ":type_id" => $type_id,
                ":material_id" => $material_id,
                ":price" => $price,
                ":description" => $description,
                ':image' => $image,
                ":amount" => $amount,
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            die();
            throw new $e();
        }
    }

    public function all(): bool|array
    {
        try {
            $query = '
                SELECT * 
                FROM `jewelry`
            ';

            $result = $this->dbConnect->prepare($query);
            $result->execute();

        } catch (PDOException $e) {
            throw new $e();
        }

        return $result->fetchAll();
    }
}