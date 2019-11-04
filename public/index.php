<?php

use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Пицца","Описание", 125);
$product->insert();
var_dump($product->id);
$product->delete();
$user = new Users("User", "UserPass", "UserName");
$user->insert();
var_dump($user->id);
$user->delete();


