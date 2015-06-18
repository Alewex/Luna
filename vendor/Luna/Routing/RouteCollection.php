<?php

namespace Luna\Routing;

class RouteCollection
{

	public $routes = [];

	public function add($route)
	{
		return $this->routes[] = $route;
	}

}