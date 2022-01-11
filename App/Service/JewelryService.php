<?php

namespace App\Service;


use App\Entity\Jewelry;
use App\Model\JewelryModel;
use App\Repository\ProductMapper;


class JewelryService
{
    private JewelryModel $jewelryModel;

    public function __construct()
    {
        $this->jewelryModel = new JewelryModel();
    }

    public function createJewelry()
    {
        $result = is_uploaded_file($_FILES['image']["tmp_name"]);

        if ($result) {
            $target_dir = "images/";
            $target_file =  $_POST['title'] . "_" . basename($_FILES["image"]["name"]);
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

    public function all(): bool|array
    {
        return $this->jewelryModel->all();
    }


}