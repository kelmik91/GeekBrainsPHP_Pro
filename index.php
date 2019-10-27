<?php
class Car {
    public $maxSpeed;
    public $type;
    public $color;

    public function __construct($maxSpeed = null, $type = null, $color = null)
    {
        $this->maxSpeed = $maxSpeed;
        $this->type = $type;
        $this->color = $color;
    }

    public function drive() {
        echo "<p>" . $this->type . " в цвете " . $this->color . " развивает скорость до  " . $this->maxSpeed . "км/ч</p>";
    }
}

class Taxi extends Car {
    public $call;
    public $price;

    public function __construct($maxSpeed = null, $type = null, $color = null, $call = null, $price = null)
    {
        parent::__construct($maxSpeed, $type, $color);
        $this->call = $call;
        $this->price = $price;
    }

    public function drive()
    {
        parent::drive();
        echo "<p>Вызов такси стоит {$this->call}</p>";
        echo "<p>Стоимость поездки равна {$this->price}</p>";
    }
}

$car = new Car(250, "Сидан", "белый");
$car->drive();

$taxi = new Taxi(120, "Минивен", "черный", 5, 500);
$taxi->drive();

// Для 5 пункта: поскольку в переменные а1 и а2 присваивается один и тот-же класс в котором x является статическим то он будет менятся для обоих перемынных а1 и а2
// Для 6 пункта: тоже что и в 5 пункте только для b1 х будет свой. Поскольку extends создаст переменные в другой области памяти