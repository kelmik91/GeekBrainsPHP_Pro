<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Model implements IModels
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert() {
        $tableName = $this->getTableName();
        $tableSql = $this->getTableSql();
        $tableSqlParam = $this->getTableSqlParam();
        $tableSqlParamKey = $this->getTableSqlParamKey();
        $sql = "INSERT INTO `{$tableName}`({$tableSql}) VALUES ({$tableSqlParam})";
        $this->db->queryInsert($sql, $tableSqlParamKey);
        return $this->id = $this->db->insertId();
    }

    public function delete() {
        $tableName = $this->getTableName();
        $tableSqlParamKeyDelete = $this->getTableSqlParamKeyDelete();
        $sql = "DELETE FROM `{$tableName}` WHERE `{$tableName}`.`id` = :id";
        return $this->db->queryDelete($sql, $tableSqlParamKeyDelete);
    }

    public function update() {

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
    abstract public function getTableSql();
    abstract public function getTableSqlParam();
    abstract public function getTableSqlParamKey();
    abstract public function getTableSqlParamKeyDelete();

}