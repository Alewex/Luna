<?php

namespace Luna\HTTP;

class Response
{

	public $body;
	public $code;
	public $headers;

	public function setHeader($header, $value)
	{
		return $this->headers[$header] = $value;
	}

	public function sendHeaders($headers = false)
	{
		if ($headers)
		{
			foreach ($headers as $header => $value)
			{
				return header("$header: $value");
			}
		} else
		{
			foreach ($this->headers as $header => $value)
			{
				return header("$header: $value");
			}
		}
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

	public function redirect($url)
	{
		$this->code(302);
		$this->setHeader('Location', $url);
		$this->sendHeaders();
	}

}