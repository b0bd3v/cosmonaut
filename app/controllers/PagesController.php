<?php

namespace App\Controllers;
use \Cosmonaut\Cosmonaut, App\Models\Page;

class PagesController extends \Cosmonaut\Controllers\Controller
{
	public function actionIndex($page)
	{
		// print_r(Cosmonaut::db()->get());
		$page = new Page();

		echo $page;	
	}
}