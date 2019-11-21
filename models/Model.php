<?php

namespace app\models;



abstract class Model
{

    public function __set($name, $value)
    {
        //TODO можно сделать проверку, а существует ли такое поле

        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}