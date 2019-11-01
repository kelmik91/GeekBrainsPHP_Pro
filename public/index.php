<?php

use app\models\{Product, Users, Basket, Orders};
use app\interfaces\IModels;
use app\engine\{Db, Autoload};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$users = new Users(new Db());

function foo(IModels $model) {
    return $model->getTableName();
}

//echo foo($users);

//echo $product->getOne(1);

$basket = new Basket();
echo $basket->basketView(1, "Диск", 5, 10, "box");
echo $basket->basketView(1, "Диск", 5, 10, "digital");

$order = new Orders();
echo $order->orderView(2, "Зарядный кабель", 50.4, 40, "weight", "01.11.2019", "+7123467");
echo $order->orderView(3, "Зарядный адаптер", 150, 40, "box", "01.11.2019", "+7123467");

echo "{$order->incomeView()} руб. приход от заказов";

