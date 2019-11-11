<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../twigTemplates');

$twig = new \Twig\Environment($loader, []);

echo $twig->render('index.twig', ['name' => 'Admin']);
echo $twig->render('catalog.twig', ['items' =>
    [[
      'name' => 'Спички',
      'description' => 'Отличные охотничьи спички',
      'price' => '12',
      'image' => 'matches.png'],
    [
      'name' => 'Спички',
      'description' => 'Отличные охотничьи спички',
      'price' => '12',
      'image' => 'matches.png'],
    [
      'name' => 'Спички',
      'description' => 'Отличные охотничьи спички',
      'price' => '12',
      'image' => 'matches.png'],
    [
      'name' => 'Спички',
      'description' => 'Отличные охотничьи спички',
      'price' => '12',
      'image' => 'matches.png']]
]);