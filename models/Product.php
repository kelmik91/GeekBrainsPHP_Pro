<?php

namespace app\models;

class Product extends DbModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image' => false
    ];



    /**
     * Product constructor.
     * @param $name
     * @param $description
     * @param $price
     * @param $image
     */
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