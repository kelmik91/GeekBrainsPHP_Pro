<?php


namespace app\models;


class Basket extends Model
{
    public $id;
    public $count;
    public $name;
    public $price;
    static $totalPrice = 0;

    public function __construct($id = null, $name = null, $count = null, $price = null)
    {
        $this->id = $id;
        $this->count = $count;
        $this->name = $name;
        $this->price = $price;
    }

    public function getTableName()
    {
        return "basket";
    }

    public function totalPriceBasket($price, $count, $typePack) {
        return self::$totalPrice += $this->totalPrice($price, $count, $typePack);
    }

    public function basketView($id, $name, $count, $price, $typePack) {
        parent::basketView($id, $name, $count, $price, $typePack);
        echo "Общая стоимоть корзины: {$this->totalPriceBasket($price, $count, $typePack)}<br>";
    }
}