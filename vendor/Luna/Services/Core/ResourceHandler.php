<?php

namespace Luna\Services\Core;

class ResourceHandler
{

	public $resource;
	private static $path = 'vendor/Luna/Resources/';

	public function path($path)
	{
		return self::$path = $path;
	}

	public function load($resource)
	{
		$this->resource = $resource;

		$path = glob(self::$path . $resource);
		$path = self::$path . $resource;

		if ($path) require_once $path;
	}

	public function getResourcePath($resource)
	{
		return glob(self::$path . $resource);
	}

	public function style($resource)
	{
		return "<link rel='stylesheet' href='" . $this->getResourcePath('css/' . $resource . '.css')[0] . "'>";
	}

	public function script($resource)
	{
		return "<script src='" . $this->getResourcePath('js/' . $resource . '.js') . "'>";
	}

}