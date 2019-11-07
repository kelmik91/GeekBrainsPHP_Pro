<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;

    private $props = [
        'name', 'description', 'price', 'image'
    ];

    public function __construct($name = null, $description = null, $price = null, $image = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }


    public static function getTableName()
   {
       return "products";
   }


}