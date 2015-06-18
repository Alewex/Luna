<?php

namespace Luna\Core;

use Luna\Routing\Route as Route;
use Luna\HTTP\Request as Request;
use Luna\HTTP\Response as Response;
use Luna\Routing\RouteHandler as Router;
use Luna\Core\ResourceHandler as Resource;
use Luna\Core\ServiceContainer;

class Luna
{

	public function __construct()
	{
		$this->router = new Router;
		$this->request = new Request;
		$this->resource = new Resource;
		$this->response = new Response;
	}

	public function get($route, $response)
	{
		return $this->processRoute('GET', $route, $response);
	}

	public function post($route, $response)
	{
		return $this->processRoute('POST', $route, $response);
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
				$this->router->addToCollection(new Route($method, $route, $response));
			}
		} else
		{
			$this->router->addToCollection(new Route($method, $route, $response));
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

	public function dispatch()
	{
		$this->request->create($_SERVER);
		
		$match = $this->routeMatchedByRequest();

		if (!empty($match))
		{
			$this->response->code(200);
			$this->response->body($match->response);
			$this->response->send();
		} else
		{
			$this->response->code(404);
			$this->response->body(function()
			{
				$this->resource->load('views/errors/404.html');
			});
			$this->response->send();
		}
	}

	public function routeMatchedByRequest()
	{
		$this->routes = $this->router->collection->routes;

		foreach ($this->routes as $route)
		{
			if ($this->request->requestQuery == $route->route && $this->request->method == $route->method) return $route;
		}
	}

}