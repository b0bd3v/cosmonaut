<?php 

namespace Cosmonaut\Utils;
use Doctrine\ORM\EntityManager,Doctrine\ORM\Configuration;

/**
* 
*/
final class DataBase extends Singleton
{

	public function load($connectionOptions)
	{
		$config = new Configuration;
		$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver('/Model'));
		$config->setProxyDir('/Proxy');
		$config->setProxyNamespace('\Proxies');
		$this->connection = EntityManager::create($connectionOptions, $config);
	}

	public function get()
	{
		return $this->connection;
	}
}