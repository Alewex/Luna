<?php

namespace Luna\HTTP;

class Response
{

	public $body;
	public $code;
	public $headers;

	public function __construct()
	{
	}

	public function header($headers = false)
	{
		$this->headers = $headers;
	}

	public function code($code)
	{
		$this->code = $code;
		return http_response_code($this->code);
	}

	public function body($body)
	{
		$this->body = $body;
	}

	public function send()
	{
		if ($this->bodyIsCallable())
		{
			return call_user_func($this->body);
		} else
		{
			return $this->body;
		}
	}

	public function bodyIsCallable()
	{
		return (is_callable($this->body) ? true : false);
	}

}