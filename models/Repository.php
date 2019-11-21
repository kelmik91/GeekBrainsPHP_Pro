<?php

namespace app\models;

use app\engine\App;
use app\interfaces\IModels;

abstract class Repository implements IModels
{

    public function getLimit($from, $to)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return App::call()->db->queryLimit($sql, $from, $to);
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
        return App::call()->db->queryOne($sql, ["value"=>$value])['count'];
    }

    public function getWhereOne($field, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return App::call()->db->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function insert(Model $entity)
    {
        $params = [];
        $columns = [];

//        var_dump($this->props);

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();

    }

    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ["id" => $entity->id]);
    }

    public function update(Model $entity)
    {
        $params = [];
        $colums = [];
        foreach ($entity->props as $key => $value) {
            if (!$entity->props[$key]) continue;
            $params[":{$key}"] = $entity->$key;
            $colums[] .= "`" . $key . "` = :" . $key;
            $entity->props[$key] = false;
            }
        $colums = implode(", ", $colums);
        $params[':id'] = $entity->id;
        $tableName = $this->getTableName();

        //Формируем умный update
        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        App::call()->db->execute($sql, $params);
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
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return App::call()->db->queryAll($sql);
    }


}