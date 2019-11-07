<?php
namespace app\models;

class Users extends DbModel
{
    public $id;
    public $login;
    public $pass;

    /**
     * Users constructor.
     * @param $login
     * @param $pass
     */
    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }


    public static function getTableName()
    {
        return "users";
    }
}