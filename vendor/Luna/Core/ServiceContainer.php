<?php

namespace Luna\Core;

class ServiceContainer {

	public static $services;

	public static function register($serviceName, $service)
	{
		self::$services[$serviceName] = $service;
	}

	public static function load($service)
	{
		if (self::serviceExists($service))
		{
			return self::$services[$service];
		}
	}

	public static function serviceExists($service)
	{
		return (array_key_exists($service, self::$services) ? true : false);
	}

}