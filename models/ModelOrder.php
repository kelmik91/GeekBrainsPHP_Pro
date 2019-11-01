<?php


namespace app\models;


abstract class ModelOrder extends Model
{
    private $income = 0;

    protected function incomeTotal($price, $count, $typePack) {
        $this->income += $this->totalPrice($price, $count, $typePack);
    }

    public function incomeView() {
        return $this->income;
    }
}