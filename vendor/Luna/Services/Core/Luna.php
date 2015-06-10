<?php

namespace Luna\Services\Core;

use Luna\Services\Core\Route as Route;
use Luna\Services\HTTP\Request as Request;
use Luna\Services\HTTP\Response as Response;
use Luna\Services\Routing\RouteHandler as Router;
use Luna\Services\Core\ResourceHandler as Resource;

class Luna
{

	public function __construct()
	{
		$this->router = new Router;
		$this->resource = new Resource;
		$this->response = new Response;
		$this->request = new Request;
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