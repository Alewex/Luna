<?php

namespace Luna\Services\Core;

class Route
{

	public $route;
	public $response;
	public $method = 'GET';

	public function __construct($method, $route, $response)
	{
		$this->method = $method;
		$this->route = $route;
		$this->response = $response;
	}

}
