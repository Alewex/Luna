<?php

namespace Luna\Database;

use Luna\Core\ResourceHandler;

class Model
{

	public $model;
	public $modelClass;

	public function __construct($model)
	{
		$this->modelClass = $model;
		$this->resource = new ResourceHandler;

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