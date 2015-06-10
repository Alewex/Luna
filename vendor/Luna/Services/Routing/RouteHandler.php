<?php

namespace Luna\Services\Routing;

use Luna\Services\Core\Route as Route;
use Luna\Services\Routing\RouteCollection as Collection;

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