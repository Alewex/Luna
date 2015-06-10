<?php

namespace Luna\Services\HTTP;

class Request
{

	public $uri;
	public $url;
	public $host;
	public $time;
	public $method;
	public $requestQuery;

	public function __construct(array $request)
	{
		$this->host = $request['HTTP_HOST'];
		$this->uri = $request['REQUEST_URI'];
		$this->time = $request['REQUEST_TIME'];
		$this->method = $request['REQUEST_METHOD'];
		$this->url = $this->host . $request['REQUEST_URI'];
		$this->requestQuery = (!empty($request['QUERY_STRING']) ? str_replace('request=', '/', $request['QUERY_STRING']) : '/');
	}

	public function method()
	{
		return $this->method;
	}

	public function getUri()
	{
		return $this->uri;
	}

	public function getQuery()
	{
		return $this->requestQuery;
	}

}