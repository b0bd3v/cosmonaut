<?php
namespace Cosmonaut\Utils;
use \App\Controllers;
/**
* 
*/
class Router extends Singleton
{

	protected $reservedWords = array(
			"controller",
			"method",
			"id",
		);
	
	public function load($route)
	{
		$route = $this->parse($route);
		
		foreach ($route as $key => $value) {
			switch ($key) {
				case 0:
					$controller = 'App\\Controllers\\' . ucfirst($value) . 'Controller';
					break;
				case 1:
					$method = 'action' . ucfirst($value);
					break;
				case 2:
					$id = $value;
					break;
			}
		}

		if(!isset($method)){
			$method = "default";
		}
		$r = new \ReflectionClass($controller);
		$objController = $r->newInstance();
		
		if(!isset($id)){
			$controllerReturn = $objController->$method();
		}else{
			$controllerReturn = $objController->$method($id);
		}

		if(is_array($controllerReturn)){
			$controllerReturn= json_encode($controllerReturn);
		}

		print($controllerReturn);
	}

	public function get()
	{
		return $this->route;
	}

	public function parse($path)
	{
		$fragments = explode('/', $path);

		foreach ($fragments as $key => $value) {
			if(strlen($value) > 0){
				$newFragments[] = $value;
			}
		}
		return $newFragments;
	}

}