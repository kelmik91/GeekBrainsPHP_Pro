<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($name, $description, $price)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName()
   {
       return "product";
   }

   public function getTableSql()
   {
       return "`name`, `description`, `img`, `price`";
   }

   public function getTableSqlParam() {
       return ":name, :description, :img, :price";
   }

   public function getTableSqlParamKey()
   {
       return ['name' => $this->name, 'description' => $this->description, 'img' => null , 'price' => $this->price];
   }

   public function getTableSqlParamKeyDelete() {
        return ['id' => $this->id];
   }

}