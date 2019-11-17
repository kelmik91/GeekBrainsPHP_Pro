<?php


namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UsersRepository;
use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        if (!(new UsersRepository())->auth($login, $pass)) {
            Die("Не верный пароль!");
        } else
            header("Location: /");
        exit();
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }

}