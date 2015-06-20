<?php

namespace Luna\HTTP\Controllers;

use Luna\Core\ServiceContainer as Service;

class BaseController
{

	public function __construct()
	{
		$this->view = Service::load('View');
		$this->model = Service::load('Model');
	}

}