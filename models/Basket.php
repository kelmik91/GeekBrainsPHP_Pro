<?php
namespace app\models;


use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    /**
     * Basket constructor.
     * @param $session_id
     * @param $goods_id
     */
    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

    public static function getBasket($session) {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public static function getTableName()
    {
        return "basket";
    }

}