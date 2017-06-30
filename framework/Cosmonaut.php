<?php

namespace Cosmonaut;
/**
* 
*/
class Cosmonaut
{
	
	static public function config()
	{
		return \Cosmonaut\Utils\Config::getInstance();
	}

	static public function db()
	{
		return \Cosmonaut\Utils\DataBase::getInstance();
	}

	static public function session()
	{
		return \Cosmonaut\Utils\Session::getInstance();
	}

	static public function router()
	{
		return \Cosmonaut\Utils\Router::getInstance();
	}
}