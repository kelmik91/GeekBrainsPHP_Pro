<?php


namespace app\controllers;

use app\models\Basket;
use app\models\ControllerModel;

class BasketController extends ControllerModel
{


    public function actionIndex()
    {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionBasket()
    {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }
}