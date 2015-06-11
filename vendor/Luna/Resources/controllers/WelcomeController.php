<?php

use Luna\Services\HTTP\Controllers\BaseController;

class WelcomeController extends BaseController
{

	public function Main()
	{
		$this->view->render('Welcome', 'Luna', ['framework' => 'Luna', 'version' => 1.5]);
	}

}