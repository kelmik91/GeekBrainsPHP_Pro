<?php


namespace app\controllers;

use app\engine\App;


class AuthController extends Controller
{
    public function actionLogin() {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        if (!App::call()->usersRepository->auth($login, $pass)) {
            Die("Не верный пароль!");
        } else
            header("Location: /");
        exit();
    }

    public function actionLogout() {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        exit();
    }

}