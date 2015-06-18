<?php

namespace Luna\Core;

class ResourceHandler
{

	public $resource;
	private static $path = 'resources/';

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
		return glob(self::$path . $resource)[0];
	}

	public function style($resource)
	{
		$path = $this->getResourcePath('assets/css/' . $resource . '.css');
		return "<link rel='stylesheet' href='/" . $path . "'>";
	}

	public function script($resource)
	{
		$path = $this->getResourcePath('assets/js/' . $resource . '.js');
		return "<script src='/" . $path . "'>";
	}

}