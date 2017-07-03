<?php
namespace Cosmonaut\Utils;
use \App\Controllers;
/**
*
*/
class Router extends Singleton
{

	public function addPatternFile($path)
	{
		if(file_exists($path)){
			$file = file_get_contents($path);
			$this->patterns = json_decode($file);
		}else{
		}
	}

	protected $reservedWords = array(
			":controller",
			":method",
			":id",
		);

	public function load($url)
	{
	
		$pattern = $this->getPattern($url);

		if(is_object($pattern)){
			$controller = 'App\\Controllers\\' . ucfirst($pattern->pattern->controller) . 'Controller';
			$method = 'action' . ucfirst($pattern->pattern->action);
			$id = $pattern->id;
		}
			
			
		if(!isset($method)){
			$method = "default";
		}

		if(isset($controller)){
			$r = new \ReflectionClass($controller);
			$objController = $r->newInstance();
			
			if(!isset($id)){
				$controllerReturn = $objController->$method();
			}else{
				$controllerReturn = $objController->$method($id);
			}
			if(is_array($controllerReturn)){
				$controllerReturn = json_encode($controllerReturn);
			}
			return $controllerReturn;
		}
		
		return;
	
	}

	public function get()
	{
		return $this->route;
	}

	public function parse($path)
	{
		if(!$path){
			return;
		}
		$fragments = explode('/', $path);
		$newFragments = [];

		if(is_array($fragments)){
			foreach ($fragments as $key => $value) {
				if(strlen($value) > 0){
					$newFragments[] = $value;
				}
			}
		}
		
		if(!$newFragments){

		}else{
			return $newFragments;
		}
		
	}

	public function getPattern($url)
	{
		
		$parsedUrl = $this->parse($url);
		foreach ($this->patterns as $pattern) {
			
			if($pattern->url == '/'){
				if($url == '/'){
					$patternToReturn = $pattern;
					break;
				}
				continue;
			}

			
			$currentUrlParsed = $this->parse($pattern->url);
			foreach ($currentUrlParsed as $index => $word) {
				if(!$this->isReservedWord($word)){
					if($currentUrlParsed[$index] == $parsedUrl[$index]){
						$patternToReturn = $pattern;
					}else{
						break;
					}
				}else{

				}
			}
		}

		$objectReturn = new \stdClass;
		$objectReturn->pattern = $patternToReturn;
		$objectReturn->parsedUrl = $parsedUrl;

		$objectReturn->id = 0;

		return $objectReturn;

	}

	public function isReservedWord(string $word):bool
	{
		foreach ($this->reservedWords as $reservedWord) {
			if($word == $reservedWord){
				return true;
			}
		}
		return false;
	}
}