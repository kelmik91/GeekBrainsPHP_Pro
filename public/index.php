<?php

use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? 'product' : $url[1];
$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "404 controller";
}


/** @var Product $product */


//http://phppro/product/card/?id=5 на страницу товара

/*
$product = Product::getOne(5);
$product->name = "Чай";
$product->save();
//$product->getWere('session_id', session_id());
*/




