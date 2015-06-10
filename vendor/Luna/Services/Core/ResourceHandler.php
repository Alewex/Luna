<?php

namespace Luna\Services\Core;

class ResourceHandler
{

	public $path = 'vendor/Luna/Resources/';
	public $resource;

	public function path($path)
	{
		$this->path = $path;
	}

	public function load($resource)
	{
		$this->resource = $resource;

		$path = glob($this->path . $resource . '.*');

		if ($path) require_once $path[0];
	}

}