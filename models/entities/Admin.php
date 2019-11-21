<?php


namespace app\models\entities;


use app\models\Model;

class Admin extends Model
{
    public $id;
    public $session_id;
    public $name;
    public $phone;
    public $status_order;

    protected $props = [
        'session_id' => false,
        'name' => false,
        'phone' => false,
        'status_order' => false
    ];

    public function __construct($session_id = null, $name = null, $phone = null)
    {
        $this->session_id = $session_id;
        $this->name = $name;
        $this->phone = $phone;
    }
}