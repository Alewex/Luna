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
		$path = self::$path . $resource;
		return (null !== glob($path) ? glob($path)[0] : false);
	}

	public function style($resource)
	{
		$path = $this->getResourcePath('assets/css/' . $resource . '.css');

		if ($path)
			return "<link rel='stylesheet' href='" . $_SERVER['ROOT'] . "/" . $path . "'>";
	}

	public function script($resource)
	{
		$path = $this->getResourcePath('assets/js/' . $resource . '.js');

		if ($path)
			return "<script src='" . $_SERVER['ROOT'] . "/" . $path . "'>";
	}

}