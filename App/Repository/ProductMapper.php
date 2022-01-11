<?php

namespace App\Repository;

use App\Model\Product;
use App\Model\ProductStorage;

class ProductMapper
{
    public function getAllProducts()
    {
        $products = ProductStorage::getProdudctsList();
        $productsObjects = array();
        var_dump($products);
        foreach ($products as $value) {
            $productsObjects[] = new Product($value['id'], $value['title'], $value['img'], $value['price']);
        }
        return $productsObjects;
    }
}