<?php

namespace Luna\Services\HTTP\Controllers;

use Luna\Services\Database\ModelHandler as Model;
use Luna\Services\HTTP\Views\ViewHandler as View;

class BaseController
{

	public function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
	}

}