<?php

use app\models\entities\Product;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct()
    {
        $name = "Чай";
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
        if (strpos(Product::class, "app\\") === 0) {}
        if (array_slice(explode("\\", get_class(new Product())), 1, 1)===['models']) {}
        if (substr_count(Product::class, "\\" ) === 3) {}
    }
    public function testProductRepository() {
        $cc = new \app\models\repositories\ProductRepository();
        $cc_result = $cc->getTableName();

        $this->assertNotNull($cc_result);
        $this->assertEquals("products", $cc_result);
    }
}