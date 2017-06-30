<?php

namespace Cosmonaut\Utils;

final class Config extends Singleton{

	public function load($path)
	{
		if(file_exists($path)){
			$file = file_get_contents($path);
			$this->config = json_decode($file);
		}else{

		}
	}

	public function get($path = null)
	{
		if($path){
			$path = (array)$this->parse($path);
			$currentData = $this->config;
			foreach ($path as $key => $value) {
				$currentData = $currentData->$value;
				if(is_string($currentData)){
					return $currentData;
				}
			}
		}else{
			return $this->config;
		}
	}

	public function parse($path)
	{
		return explode('.', $path);
	}

}
