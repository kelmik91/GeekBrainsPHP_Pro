<?php


namespace app\controllers;


use app\models\Basket;
use app\models\Product;

class BasketController extends Controller
{

    public function actionIndex() {
        //$basket = Basket::getBasket(session_id());
        echo $this->render('basket');
    }



}