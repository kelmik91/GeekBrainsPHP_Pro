<?php


namespace app\models\repositories;


use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{

    public function getTableName()
    {
        return "products";
    }

    public function getEntityClass()
    {
        return Product::class;
    }
}