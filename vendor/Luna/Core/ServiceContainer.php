<?php

namespace Luna\Core;

class ServiceContainer {

	public static $services;

	public function register($serviceName, $service)
	{
		self::$services[$serviceName] = $service;
	}

	public function load($service)
	{
		if ($this->serviceExists($service))
		{
			return self::$services[$service];
		}
	}

	public function serviceExists($service)
	{
		return (array_key_exists($service, self::$services) ? true : false);
	}

}