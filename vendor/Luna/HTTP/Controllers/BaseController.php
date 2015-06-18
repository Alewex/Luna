<?php

namespace Luna\HTTP\Controllers;

use Luna\Database\ModelHandler as Model;
use Luna\HTTP\Views\ViewHandler as View;

class BaseController
{

	public function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
	}

}