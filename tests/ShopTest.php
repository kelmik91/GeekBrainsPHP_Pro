<?php

class ShopTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd()
    {
        $x = 1;
        $y = 2;
        $this->assertEquals(3, $x + $y);
    }
    public function testSub()
    {
        $x = 4;
        $y = 2;
        $this->assertEquals(2, $x - $y);
    }
    /**
     * @dataProvider providerFactorial
     */
    public function testFactorial($a, $b) {
        $my = new MathClass();
        $this->assertEquals($b, $my->factorial($a));
    }
    public function providerFactorial () {
        return array(
            array(0, 1),
            array(2, 2),
            array(5, 120)
        );
    }
}

class MathClass {
    public function factorial($n) {
        if ($n == 0)
            return 1;
        else
            return $n * $this->factorial($n - 1);
    }
}