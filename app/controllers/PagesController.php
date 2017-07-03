<?php

namespace App\Controllers;

class PagesController extends \Cosmonaut\Controllers\Controller
{
	public function actionIndex($page)
	{
		echo $page;
	}
}