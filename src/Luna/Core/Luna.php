<?php

namespace Luna\Core;

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
		return $this->router->createRoute('GET', $route, $response);
	}

	public function post($route, $response)
	{
		return $this->router->createRoute('POST', $route, $response);
	}

	public function put($route, $response)
	{
		return $this->router->createRoute('PUT', $route, $response);
	}

	public function delete($route, $response)
	{
		return $this->router->createRoute('DELETE', $route, $response);
	}

	public function dispatch()
	{
		$this->request->create($_SERVER);

		$match = $this->routeMatchedByRequest();
		var_dump($match);

		if (!empty($match))
		{
			$this->response->code(200);
			$this->response->body(function() use($match)
			{
				call_user_func_array($match->response, $match->placeholders);
			});
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
			$request = $this->request->requestQuery;

			if (preg_match("#$route->route#", $request, $matches))
			{
				$matches = array_splice($matches, 1);
			}

			if ($matches)
			{
				$route->placeholders = array_combine($route->placeholders, $matches);
				return $route;
			} else
			{
				if ($this->request->requestQuery == $route->route && $this->request->method == $route->method) return $route;
			}
		}
	}

}