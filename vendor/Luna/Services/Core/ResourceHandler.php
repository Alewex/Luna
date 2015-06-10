<?php

namespace Luna\Services\Core;

class ResourceHandler
{

	private static $path = 'vendor/Luna/Resources/';
	public $resource;

	public function path($path)
	{
		return self::$path = $path;
	}

	public function load($resource)
	{
		$this->resource = $resource;

		$path = glob(self::$path . $resource . '.*');

		if ($path) require_once $path[0];
	}

}