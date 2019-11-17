<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Basket;
use app\models\entities\Product;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{

    public function actionIndex()
    {
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }

    public function actionAddToBasket()
    {
        $id = (new Request())->getParams()['id'];

        $basket = new Basket(session_id(), $id);

        (new BasketRepository())->save($basket);

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id())]);
        die();
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $session = session_id();
        $basket = (new BasketRepository())->getOne($id);

        if ($session == $basket->session_id) {

            (new BasketRepository())->delete($basket);
        }
        echo json_encode(['response' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id())]);
        die();
    }

}