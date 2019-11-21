<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Order;

class OrderController extends Controller
{
    public function actionCreateOrder() {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $session = session_id();
        $order = new Order($session, $name, $phone);

        if ($session == $order->session_id) {

            App::call()->orderRepository->save($order);
        }

        session_regenerate_id();
        echo "<h3>Заказ создан</h3><hr>";
        echo $this->render('index');
    }
}