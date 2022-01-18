<?php

namespace App\Model;

use Framework\Exception\NotJewelry;
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

    public function getByField(array $params): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `jewelry`
                WHERE ';

            $i = 0;
            foreach ($params as $field => $value) {
                if ($i === 0) {
                    $query .= $field . " = " . "'$value'" . " ";
                } else {
                    $query .= " AND " . $field . " = " . "'$value'";
                }
                $i++;
            }
            $result = $this->dbConnect->prepare($query);
            $result->execute();
            $jewelry = $result->fetchAll();

        } catch (PDOException $e) {
            throw new $e();
        }
        return $jewelry;
    }

    public function updateJewelry(
        $id,
        $title,
        $price,
        $description,
        $image,
        $amount,

    ): void
    {
        try {
            $result = $this->dbConnect->prepare("
                    UPDATE `jewelry`
                    SET
                        title = :title,
                        price = :price,
                        description = :description,
                        image = :image,
                        amount = :amount
                    WHERE
                          id = :id
                ");

            $result->execute([
                ':id' => $id,
                ":title" => $title,
                ":price" => $price,
                ":description" => $description,
                ":image" => $image,
                ":amount" => $amount,
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            throw new $e();
        }
    }

    public function deleteJewelry(int $id): void
    {
        try {
            $result = $this->dbConnect->prepare("
                DELETE 
                FROM `jewelry`
                WHERE id = :id 
            ");
            $result->execute([":id" => $id]);
        } catch (PDOException $e) {
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