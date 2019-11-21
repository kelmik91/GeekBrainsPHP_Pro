<?php
namespace app\models\entities;


use app\models\Model;

class Order extends Model
{
    public $id;
    public $session_id;
    public $name;
    public $phone;

    protected $props = [
        'session_id' => false,
        'name' => false,
        'phone' => false
    ];

    public function __construct($session_id = null, $name = null, $phone = null)
    {
        $this->session_id = $session_id;
        $this->name = $name;
        $this->phone = $phone;
    }



}