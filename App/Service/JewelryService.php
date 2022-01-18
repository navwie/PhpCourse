<?php

namespace App\Service;


use App\Entity\Jewelry;
use App\Model\JewelryModel;
use App\Repository\JewelryMapper;


class JewelryService
{
    private JewelryModel $jewelryModel;
    private JewelryMapper $jewelryMapper;

    public function __construct()
    {
        $this->jewelryModel = new JewelryModel();
        $this->jewelryMapper = new JewelryMapper();
    }

    public function getByField(array $params): array
    {
        return $this->jewelryMapper->mapJewelry($this->jewelryModel->getByField($params));
    }

    public function createJewelry()
    {
        $result = is_uploaded_file($_FILES['image']["tmp_name"]);

        if ($result) {
            $target_dir = "images/";
            $target_file = basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES['image']["tmp_name"], $target_dir . $target_file);
            chmod($target_dir . $target_file, octdec('0777'));

            $this->jewelryModel->createJewelry(
                $_POST['title'],
                $_POST['type_id'],
                $_POST['material_id'],
                $_POST['price'],
                $_POST['description'],
                $target_file,
                $_POST['amount']
            );

        } else {
            echo "Возможная атака с участием загрузки файла\n ";
        }
    }

    public function updateJewelry(int $id): void
    {
        $target_file = $this->getByField(["id" => $id])[0]->getImage();
        if (isset($_FILES["image"]["name"])) {
            $target_dir = "images/";
            $target_file = $_POST['title'] . "_" . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);
        }

        $this->jewelryModel->updateJewelry(
            $id,
            $_POST['title'],
            $_POST['price'],
            $_POST['description'],
            $target_file,
            $_POST['amount'],

        );
    }

    public function deleteJewelry($id)
    {
        $this->jewelryModel->deleteJewelry($id);
    }

    public function all(): array
    {
        return $this->jewelryModel->all();

    }


}