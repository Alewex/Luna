<?php

namespace Luna\Routing;

use Luna\Routing\Route as Route;
use Luna\Routing\RouteCollection as Collection;

class RouteHandler
{

	public function __construct()
	{
		$this->collection = new Collection;
	}

	public function addToCollection(Route $route)
	{
		return $this->collection->add($route);
	}

}