<?php
require_once dirname(__DIR__) . '\vendor\autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new \app\core\Application();

require_once \app\core\Application::$ROOT_DIR . "\helpers\uid.php";
require_once \app\core\Application::$ROOT_DIR . "\helpers\asset.php";
require_once \app\core\Application::$ROOT_DIR . "\helpers\component.php";
require_once \app\core\Application::$ROOT_DIR . "\helpers\csrf.php";

$app->init();
