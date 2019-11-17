<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Repository implements IModels
{

    public function getLimit($from, $to)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return Db::getInstance()->queryLimit($sql, $from, $to);
    }

    public function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryOne($sql, ["value"=>$value])['count'];
    }

    public function getWhereOne($field, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function insert(Model $entity)
    {
        $params = [];
        $columns = [];

        //var_dump($this->props);

        foreach ($entity as $key => $value) {
            if ($key == "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);

        $entity->id = Db::getInstance()->lastInsertId();

    }

    public function delete(Model $entity)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ["id" => $entity->id]);
    }

    public function update(Model $entity)
    {
        //TODO сделать умный update по props
    }

    public function save(Model $entity)
    {

        if (is_null($entity->id)) {
            $this->insert($entity);
        }

        else
            $this->update($entity);
    }

    public function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }


}