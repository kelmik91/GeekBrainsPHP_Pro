<?php
namespace app\models\entities;


use app\engine\Db;
use app\models\Model;

class Basket extends Model
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



}