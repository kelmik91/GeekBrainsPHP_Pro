<?php

namespace app\controllers;


use app\engine\Request;
use app\models\Product;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionApiCatalog() {
        $catalog = Product::getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCard() {
        $id = (new Request())->getParams()["id"];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }

}