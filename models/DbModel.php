<?php

namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{

    public function getLimit($from, $to)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return Db::getInstance()->queryLimit($sql, $from, $to);
    }

    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryOne($sql, ["value"=>$value])['count'];
    }

    public function getWhereOne($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryObject($sql, ["value" => $value], static::class);
    }

    public function insert()
    {
        $params = [];
        $columns = [];

//        var_dump($this->props);

        foreach ($this as $key => $value) {
            if ($key == "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        if (!is_null($this->product_id)) {
            $this->id = $this->product_id;
        }

        return Db::getInstance()->execute($sql, ["id" => $this->id]);
    }

    public function update()
    {

    }

    public function save()
    {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    abstract public static function getTableName();

}