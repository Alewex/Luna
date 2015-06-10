<?php

namespace Luna\Services\Core;

use Luna\Services\Core\Route as Route;
use Luna\Services\HTTP\Request as Request;
use Luna\Services\HTTP\Response as Response;
use Luna\Services\Routing\RouteHandler as Router;

class Luna
{

	public function __construct()
	{
		$this->router = new Router;
		$this->response = new Response;
		$this->request = new Request($_SERVER);
	}

	public function get($route, $response)
	{
		return $this->router->addToCollection(new Route('GET', $route, $response));
	}

	public function post($route, $response)
	{
		return $this->router->addToCollection(new Route('POST', $route, $response));
	}

	public function dispatch()
	{
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
				echo "Page not found.";
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