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


}