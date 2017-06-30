<?php 

use Doctrine\ORM\EntityManager,	Doctrine\ORM\Configuration, Cosmonaut\Config;

require_once "vendor/autoload.php";

$config = new Config();

$config = new Configuration;
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver('/Model'));
$config->setProxyDir('/Proxy');
$config->setProxyNamespace('\Proxies');

$connectionOptions = array(
	'driver'   => 'pdo_mysql',
	'user'     => 'root',
	'password' => 'master',
	'dbname'   => 'cosmonaut'
);

$em = EntityManager::create($connectionOptions, $config);



