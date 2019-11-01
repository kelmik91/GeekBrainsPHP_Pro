<?php

namespace app\models;
use app\interfaces\IModels;
use app\engine\Db;

abstract class Model implements IModels
{
    protected $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();

    protected function totalPrice($price, $count, $typePack) {
        switch ($typePack){
            case "weight":
            case "digital":
                $totalPrice = $price * $count;
                break;
            case "box":
                $totalPrice = ($price * $count) * 2;
                break;
        }
        return $totalPrice;

    }

    private function typePack($typePack) {
        switch ($typePack){
            case "weight":
                $rend = "кг";
                break;
            case "digital":
            case "box":
                $rend = "шт";
                break;
        }
        return $rend;
    }

    public function basketView($id, $name, $count, $price, $typePack) {
        echo "Продукт №{$id} - {$name}.<br> Цена - {$count} Руб. за 1 ед.<br>
                {$count} {$this->typePack($typePack)}. будут стоить {$this->totalPrice($price, $count, $typePack)} Руб.<br>
                Тип заказа {$typePack}<br>";
    }

    public function orderView($id, $name, $count, $price, $typePack, $dataOrder, $phone) {
        echo "<hr>Заказ от {$dataOrder}.<br>
              Для связи {$phone}.<br>
              Продукт №{$id} - {$name}.<br>
              Цена - {$count} Руб. за 1 ед.<br>
              {$count} {$this->typePack($typePack)} будет стоить - {$this->totalPrice($price, $count, $typePack)} Руб.<br>
              Тип заказа {$typePack}<hr>";
    }

}