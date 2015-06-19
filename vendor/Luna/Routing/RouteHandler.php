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

	public function processRoute($method, $route, $response)
	{
		if (!is_callable($response) && is_array($response))
		{
			$response = $this->processResponse($response);
		}

		if (is_array($route))
		{
			foreach ($route as $route)
			{
				$this->addToCollection(new Route($method, $route, $response));
			}
		} else
		{
			$this->addToCollection(new Route($method, $route, $response));
		}
	}

	public function processResponse(array $response)
	{
		$type = array_keys($response)[0];
		$action = array_values($response)[0];

		switch ($type)
		{
			case 'controller':
				return function() use ($action) { ServiceContainer::$services['Controller']->load($action); };
			break;

			case 'view':
				if (is_array($action))
				{
					return function() use ($action) { ServiceContainer::$services['View']->render($action['view'], (isset($action['title']) ? $action['title'] : null), (isset($action['data']) ? $action['data'] : null)); };
				} else
				{
					return function() use ($action) { ServiceContainer::$services['View']->render($action); };
				}
			break;
		}
	}

}