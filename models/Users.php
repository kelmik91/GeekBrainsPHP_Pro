<?php
namespace app\models;

class Users extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }

    public static function getName() {
        return $_SESSION['login'];
    }

    public static function auth($login, $pass) {
        $user = static::getWhereOne('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
    }

    public static function getTableName()
    {
        return "users";
    }
}