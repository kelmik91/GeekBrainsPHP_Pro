<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Basket;


class BasketController extends Controller
{

    public function actionIndex()
    {
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', ['products' => $basket]);
    }

    public function actionAddToBasket()
    {
        $id = App::call()->request->getParams()['id'];

        $basket = new Basket(session_id(), $id);

        App::call()->basketRepository->save($basket);

        header('Content-Type: application/json');
        echo json_encode([
            'response' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
        die();
    }

    public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOne($id);

        if ($session == $basket->session_id) {

            App::call()->basketRepository->delete($basket);
        }
        echo json_encode([
            'response' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
        die();
    }
}