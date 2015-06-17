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

		$path = self::$path . $resource;

		if (file_exists($path)) require_once $path;
	}

	public function getResourcePath($resource)
	{
		return glob(self::$path . $resource);
	}

	public function style($resource)
	{
		$path = $this->getResourcePath('css/' . $resource . '.css')[0];
		return "<link rel='stylesheet' href='/" . $path . "'>";
	}

	public function script($resource)
	{
		$path = $this->getResourcePath('js/' . $resource . '.js')[0];
		return "<script src='/" . $path . "'>";
	}

}