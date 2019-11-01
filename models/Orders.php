<?php


namespace app\models;


class Orders extends ModelOrder
{
    public $id;
    public $count;
    public $name;
    public $price;
    public $dataOrder;
    public $phone;

    public function __construct($id = null, $count = null, $name = null, $price = null, $dataOrder = null, $phone = null)
    {
        $this->id = $id;
        $this->count = $count;
        $this->name = $name;
        $this->price = $price;
        $this->dataOrder = $dataOrder;
        $this->phone = $phone;
    }


    public function getTableName()
    {
        return "orders";
    }

    public function orderView($id, $name, $count, $price, $typePack, $dataOrder, $phone) {
        parent::orderView($id, $name, $count, $price, $typePack, $dataOrder, $phone);
        parent::incomeTotal($price, $count, $typePack);
    }
}