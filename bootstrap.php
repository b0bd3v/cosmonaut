<?php 

require_once "vendor/autoload.php";

use Cosmonaut\Utils\Config;
use Cosmonaut\Utils\Router;
use Cosmonaut\Utils\DataBase;
use Cosmonaut\Cosmonaut;


$config = Config::getInstance();
$config->load("../config/main.json");

$router = Router::getInstance();
Cosmonaut::router()->addPatternFile("../config/routes.json");

$connectionOptions = array(
	'driver'   => Cosmonaut::config()->get("db.driver"),
	'user'     => Cosmonaut::config()->get("db.user"),
	'password' => Cosmonaut::config()->get("db.password"),
	'dbname'   => Cosmonaut::config()->get("db.dbname")
);

// echo Cosmonaut::session()->get('teste');
Cosmonaut::db()->load($connectionOptions);
Cosmonaut::router()->load($_SERVER['REQUEST_URI']);



