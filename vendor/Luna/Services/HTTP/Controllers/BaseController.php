<?php

namespace Luna\Services\HTTP\Controllers;

use Luna\Services\HTTP\Views\ViewHandler as View;

class BaseController
{

	public function __construct()
	{
		$this->view = new View();
	}

}