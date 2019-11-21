<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    protected $config;

    private $connection = null;

    public function __construct($driver, $host, $login, $password, $database, $charset = "utf8")
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

    private function getConnection() {
        if (is_null($this->connection)) {

            $this->connection = new \PDO($this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->connection;
    }
//"SELECT * FROM goods WHERE id = :id;", ["id" => 1]
    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);

        return $pdoStatement;
    }

    public function queryLimit($sql, $from, $to) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->bindValue(':from', $from, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':to', $to, \PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement;
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

    public function queryObject($sql, $params, $class){
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $obj = $pdoStatement->fetch();
        if (!$obj) {
            throw new \Exception("Продукт не найден", 404);
        }
        return $obj;
    }

    public function execute($sql, $params) {
        $this->query($sql, $params);
        return true;
    }



    private function prepareDSNString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }


    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function __toString()
    {
        return "Db";
    }

}