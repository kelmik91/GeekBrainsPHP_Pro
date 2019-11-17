<?php
session_start();

use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Request;


try {
    include realpath("../config/config.php");
   // include realpath("../engine/Autoload.php");
    include realpath('../vendor/autoload.php');

    spl_autoload_register([new Autoload(), 'loadClass']);

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();


    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        echo "404 controller";
    }
} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
};

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




