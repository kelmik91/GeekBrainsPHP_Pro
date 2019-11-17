<?php
namespace app\models\entities;
use app\models\Model;

class Users extends Model
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

}