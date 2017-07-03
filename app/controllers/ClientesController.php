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

	public function actionDefault($id = null)
	{
		echo 'ID: ' . $id . '<br>';
		return array('teste' => 'teste');
	}

	public function actionIndex($id = null)
	{
		echo 'actionIndex';
		return array('teste' => $id);
	}
}