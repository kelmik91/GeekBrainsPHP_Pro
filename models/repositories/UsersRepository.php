<?php


namespace app\models\repositories;


use app\models\entities\Users;
use app\models\Repository;

class UsersRepository extends Repository
{

    public function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }

    public function getName() {
        return $_SESSION['login'];
    }

    public function auth($login, $pass) {
        $user = static::getWhereOne('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
    }

    public function getTableName()
    {
        return "users";
    }


    public function getEntityClass()
    {
        return Users::class;
    }
}