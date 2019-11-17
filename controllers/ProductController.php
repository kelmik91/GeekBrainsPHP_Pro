<?php

namespace app\controllers;


use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $catalog = (new ProductRepository())->getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionApiCatalog() {
        $catalog = (new ProductRepository())->getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCard() {
        //TODO Переделать на request
        $id = $_GET['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }

}