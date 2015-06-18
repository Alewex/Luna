<?php

namespace Luna\HTTP\Controllers;

use Luna\HTTP\Controllers\Controller;

class ControllerHandler
{

	public function load($class, $method = false)
	{
		return new Controller($class, $method);
	}

}