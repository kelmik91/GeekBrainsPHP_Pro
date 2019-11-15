<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Basket;
use app\models\Product;

class BasketController extends Controller
{

    public function actionIndex()
    {
        $basket = Basket::getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }

    public function actionAddToBasket()
    {
        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id))->save();

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => Basket::getCountWhere('session_id', session_id())]);
        die();
    }
    public function actionDelToBasket()
    {
        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id))->delete();

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => Basket::getCountWhere('session_id', session_id())]);
        die();
    }


}