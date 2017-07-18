<?php 

namespace Cosmonaut\Views;
/**
* Main View class
*
* @package  Views
* @author   Roberto Martins da Silva <roberto.martins.info@gmail.com>
* @version  $Revision: 1 $
* @access   public
*/
class View extends \Cosmonaut\Views\BaseView
{


	private function getFile()
	{
		if(file_exists($path)){
			return file($path);
		}else{
			return false;
		}
	}

	public function setValues($values)
	{
		foreach ($values as $key => $value) {
			$this->replaceValue($key, $value);
		}
	}

}


