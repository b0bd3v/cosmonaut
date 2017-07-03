<?php
namespace App\Controllers;
/**
* 
*/
class ClientesController extends \Cosmonaut\Controllers\ApiController
{
	public function __construct()
	{
	
	}

	public function default()
	{
		return array('teste' => 'teste' );
	}

	public function actionIndex($id = null)
	{
		return array('teste' => $id);
	}
}