<?php

namespace Luna\Database;

use Luna\Core\ResourceHandler;
use Luna\Core\ServiceContainer as Service;

class Model
{

	public $model;
	public $modelClass;

	public function __construct($model)
	{
		$this->modelClass = $model;
		$this->resource = Service::load('Resource');

		return $this->loadModel();
	}

	public function loadModel()
	{
		$path = $this->resource->getResourcePath('models/' . $this->modelClass . '.php');

		if ($this->modelExists($path))
		{
			require_once $path;

			return $this->model = new $this->modelClass;
		}
	}

	public function modelExists($pathToModel)
	{
		return (file_exists($pathToModel) ? true : false);
	}

}