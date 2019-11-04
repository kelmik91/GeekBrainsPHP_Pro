<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;
    public $name;

    public function __construct($login, $pass, $name)
    {
        parent::__construct();
        $this->login = $login;
        $this->pass = $pass;
        $this->name = $name;
    }

    public function getTableName()
    {
        return "user";
    }

    public function getTableSql()
    {
        return "`login`, `pass`, `name`";
    }

    public function getTableSqlParam() {
        return ":login, :pass, :name";
    }

    public function getTableSqlParamKey()
    {
        return ['login' => $this->login, 'pass' => $this->pass, 'name' => $this->name];
    }

    public function getTableSqlParamKeyDelete() {
        return ['id' => $this->id];
    }
}