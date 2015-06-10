<?php

namespace Luna\Services\Routing;

class RouteCollection
{

	public $routes = [];

	public function add($route)
	{
		return $this->routes[] = $route;
	}

}