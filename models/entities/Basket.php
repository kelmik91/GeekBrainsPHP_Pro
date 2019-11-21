<?php
namespace app\models\entities;


use app\models\Model;

class Basket extends Model
{
    public $id;
    public $session_id;
    public $product_id;

    protected $props = [
        'session_id' => false,
        'product_id' => false
    ];

    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }



}