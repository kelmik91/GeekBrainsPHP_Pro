<?php


namespace app\models\repositories;


use app\engine\App;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{
    public function getBasket($session) {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }

    public function getTableName()
    {
        return "basket";
    }

    public function getEntityClass()
    {
        return Basket::class;
    }
}