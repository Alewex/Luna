<?php

namespace Luna\Routing;

use Luna\Routing\Route as Route;
use Luna\Core\ServiceContainer as Service;
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

	public function createRoute($method, $route, $response)
	{
		if (!is_callable($response) && is_array($response))
		{
			$response = $this->processResponse($response);
		}

		if (is_array($route))
		{
			foreach ($route as $route)
			{
				$processed = $this->processRoute($route);
				$placeholders = (isset($processed['placeholders']) ? $processed['placeholders'] : false);

				$this->addToCollection(new Route($method, $processed[0], $response, $placeholders[1]));
			}
		} else
		{
			$processed = $this->processRoute($route);
			$placeholders = (isset($processed['placeholders']) ? $processed['placeholders'] : false);
	
			$this->addToCollection(new Route($method, $processed[0], $response, $placeholders[1]));
		}
	}

	public function processRoute($route)
	{
		if (preg_match('#{(.*?)}#', $route))
		{
			$regex = preg_replace('#{(.*?)}#', '([^/]+)', $route);
			preg_match_all('/{(.*?)}/', $route, $match);
			return (isset($match) ? array(array('route' => $route, 'routeRegex' => $regex), 'placeholders' => $match) : $route);
		} else
		{
			return array(array('route' => $route));
		}
	}

	public function processResponse(array $response)
	{
		$type = array_keys($response)[0];
		$action = array_values($response)[0];

		switch ($type)
		{
			case 'controller':
				return function() use ($action) { Service::$services['Controller']->load($action); };
			break;

			case 'view':
				if (is_array($action))
				{
					return function() use ($action) { Service::$services['View']->render($action['view'], (isset($action['title']) ? $action['title'] : null), (isset($action['data']) ? $action['data'] : null)); };
				} else
				{
					return function() use ($action) { Service::$services['View']->render($action); };
				}
			break;
		}
	}

}