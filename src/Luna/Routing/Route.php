<?php

namespace Luna\Routing;

class Route
{

	public $route;
	public $response;
	public $method = 'GET';
	public $placeholders;

	public function __construct($method, $route, $response, $placeholders = false)
	{
		$this->route = $route;
		$this->method = $method;
		$this->response = $response;
		$this->placeholders = $placeholders;
	}

}