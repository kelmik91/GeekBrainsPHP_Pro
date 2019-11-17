<?php

namespace app\models\entities;
use app\models\Model;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;

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




}