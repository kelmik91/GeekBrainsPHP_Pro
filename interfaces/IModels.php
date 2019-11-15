<?php

namespace app\interfaces;

interface IModels
{
    public static function getOne($id);
    public static function getAll();
    public static function getTableName();
}