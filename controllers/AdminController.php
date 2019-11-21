<?php


namespace app\controllers;

use app\engine\App;
use app\models\entities\Order;


class AdminController extends Controller
{
    public function actionIndex() {
        if ($_SESSION['login'] == 'admin') {
            $orders = App::call()->adminRepository->getAll();
            echo $this->render('admin', ['orders' => $orders]);
        } else {
            echo "Нет доступа!";
        }
    }


    public function actionCard() {
        if ($_SESSION['login'] == 'admin') {
           $id = $_GET['id'];
           $session_id = $_GET['session_id'];
           $order = App::call()->adminRepository->getOrder($id);
           $basket = App::call()->basketRepository->getBasket($session_id);
           echo $this->render('cardOrder', ['order' => $order, 'basket' => $basket]);
        } else {
            echo "Нет доступа!";
        }
    }

    public function actionUpdate() {
        $id = $_GET['id'];
        $status_order = $_GET['status_order'];
        $referer  = $_SERVER['HTTP_REFERER'];
        $sql = "UPDATE orders_shop SET status_order = :status_order WHERE orders_shop.id = :id";
        App::call()->db->execute($sql, ["id" => $id, 'status_order' => $status_order]);
        return header("Location: $referer");
    }
}