<?php
define('DS', DIRECTORY_SEPARATOR);
//define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../");
define("ROOT_DIR", dirname(__DIR__));
define("TEMPLATES_DIR", dirname(__DIR__) . "/templates/");
define("TEMPLATES_DIR_TWIG", dirname(__DIR__) . "/twigTemplates/");
define("CONTROLLER_NAMESPACE", "app\\controllers\\");