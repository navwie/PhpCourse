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
        $sex_id,
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
                (title, type_id, material_id, price, description, image, amount, sex_id)
                VALUES 
                (:title, :type_id, :material_id, :price, :description, :image,:amount, :sex_id) 
            ");
            $result->execute([
                ":title" => $title,
                ":type_id" => $type_id,
                ":material_id" => $material_id,
                ":price" => $price,
                ":description" => $description,
                ':image' => $image,
                ":amount" => $amount,
                ":sex_id" => $sex_id,

            ]);
        } catch (PDOException $e) {
            var_dump($e);
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
        if (empty($jewelry)) {
            throw new NotJewelry();
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

    public function getTypeNameByTypeId(int $id): string
    {
        try {
            $query = '
                SELECT type
                FROM `type`
                WHERE id = :id';

            $result = $this->dbConnect->prepare($query);
            $result->execute([':id' => $id]);
            $typeName = $result->fetch()['type'];
        } catch (PDOException $e) {
            throw new $e();
        }
        return $typeName;
    }

    public function getMaterialNameByMaterialId(int $id): string
    {
        try {
            $query = '
                SELECT name
                FROM `material`
                WHERE id = :id';

            $result = $this->dbConnect->prepare($query);
            $result->execute([':id' => $id]);
            $materialName = $result->fetch()['name'];
        } catch (PDOException $e) {
            throw new $e();
        }
        return $materialName;
    }

    public function getSexNameByTypeId(int $id): string
    {
        try {
            $query = '
                SELECT sex
                FROM `sex`
                WHERE id = :id';

            $result = $this->dbConnect->prepare($query);
            $result->execute([':id' => $id]);
            $typeName = $result->fetch()['sex'];
        } catch (PDOException $e) {
            throw new $e();
        }
        return $typeName;
    }

    public function getJewelryByType($id): array
    {
        try {
            $query = '
                SELECT *
                FROM `jewelry`
                WHERE type_id = :id';

            $result = $this->dbConnect->prepare($query);
            $result->execute([':id' => $id]);
            $jewelries = $result->fetchAll();
        } catch (PDOException $e) {
            throw new $e();
        }
        return $jewelries;
    }

    public function getJewelryBySex($id): array
    {
        try {
            $query = '
                SELECT *
                FROM `jewelry`
                WHERE sex_id = :idSex';

            $result = $this->dbConnect->prepare($query);
            $result->execute([':idSex' => $id]);
            $jewelries = $result->fetchAll();
        } catch (PDOException $e) {
            throw new $e();
        }
        return $jewelries;
    }

    public function buy($productId, $amount): void
    {
        try {
            $result = $this->dbConnect->prepare("
                UPDATE `jewelry`
                SET amount = amount - :amount
                WHERE id = :id 
            ");
            $result->execute([":amount" => $amount, ":id" => $productId]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

}