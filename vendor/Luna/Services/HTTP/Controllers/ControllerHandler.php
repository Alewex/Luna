<?php

namespace Luna\Services\HTTP\Controllers;

use Luna\Services\HTTP\Controllers\Controller;

class ControllerHandler
{

	public function load($class, $method = false)
	{
		return new Controller($class, $method);
	}

}