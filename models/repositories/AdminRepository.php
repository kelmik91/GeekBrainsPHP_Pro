<?php


namespace app\models\repositories;


use app\engine\App;
use app\models\entities\Admin;
use app\models\Repository;

class AdminRepository extends Repository
{
    public function getOrder($id) {
        $sql = "SELECT * FROM orders_shop WHERE id = :id";
        return App::call()->db->queryAll($sql, ['id' => $id]);
    }
    public function getTableName()
    {
        return "orders_shop";
    }

    public function getEntityClass()
    {
        return Admin::class;
    }
}