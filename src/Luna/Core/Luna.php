<?php

namespace Luna\Core;

use Luna\Routing\Route as Route;
use Luna\HTTP\Request as Request;
use Luna\HTTP\Response as Response;
use Luna\Routing\RouteHandler as Router;
use Luna\Core\ResourceHandler as Resource;

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
		return $this->router->processRoute('GET', $route, $response);
	}

	public function post($route, $response)
	{
		return $this->router->processRoute('POST', $route, $response);
	}

	public function put($route, $response)
	{
		return $this->router->processRoute('PUT', $route, $response);
	}

	public function delete($route, $response)
	{
		return $this->router->processRoute('DELETE', $route, $response);
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