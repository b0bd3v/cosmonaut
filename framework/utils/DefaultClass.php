<?php

namespace Cosmonaut\Utils;

/**
* 
*/
class DefaultClass
{
	public function __construct()
	{
		if(Cosmonaut::config()->get('environment') == 'development'){
			//
		}
	}
}
