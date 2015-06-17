<?php

namespace Luna\Services\HTTP\Controllers;

use Luna\Services\Core\ResourceHandler;

class Controller
{

	public $class;
	public $method;

	public function __construct($class, $method)
	{
		$this->class = $class;
		$this->method = $method;
		$this->resource = new ResourceHandler;

		$this->loadController();
	}

	public function loadController()
	{
		$path = $this->resource->getResourcePath('controllers/' . $this->class . '.php');

		if ($this->controllerExists($path))
		{
			require_once $path;

			$controller = new $this->class;

			if ($this->methodOfControllerExists($controller))
			{
				return $controller->{$this->method}();
			} else
			{
				return $controller->main();
			}
		}
	}

	public function controllerExists($pathToController)
	{
		return (file_exists($pathToController) ? true : false);
	}

	public function methodOfControllerExists($controller)
	{
		return (method_exists($controller, $this->method) ? true : false);
	}

}