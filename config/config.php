<?php
use app\engine\Request;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\UsersRepository;
use app\models\repositories\AdminRepository;
use app\engine\Db;

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../templates/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //TODO По хорошему сделать для репозиториев отедьное простое хранилищебез reflection
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'usersRepository' => [
            'class' => UsersRepository::class
        ],
        'adminRepository' => [
            'class' => AdminRepository::class
        ]

    ]
];
/*
define('DS', DIRECTORY_SEPARATOR);
//define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../");
define("ROOT_DIR", dirname(__DIR__));
define("TEMPLATES_DIR", dirname(__DIR__) . "/templates/");
define("CONTROLLER_NAMESPACE", "app\\controllers\\");
*/