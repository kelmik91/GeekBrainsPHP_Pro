<?php

use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};
use app\engine\Render;

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? 'product' : $url[1];
$actionName = $url[2];


$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404 controller";
}


/** @var Product $product */



//$product = new Product("Пицца","Описание", 125, "1.jpg");

//$product = new Product();
//

//$product->delete();


/*
$product = Product::getOne(5);
$product->name = "Чай";
$product->save();
//$product->getWere('session_id', session_id());
*/




