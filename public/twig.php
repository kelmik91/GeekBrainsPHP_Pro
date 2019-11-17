<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../twigTemplates');

$twig = new \Twig\Environment($loader, []);

class Product {
    protected $name = "Admin";
    public function __get($name)
    {
        return $this->$name;
    }
    public function __isset($name)
    {
        return isset($this->name);
    }
}

$product = new Product();

var_dump($product);
echo $twig->render('index.twig', ['product' => $product]);