<?php

namespace Luna\Services\HTTP\Views;

use Luna\Services\HTTP\Views\View;

class ViewHandler
{

	public function render($view = false, $title = false, $data = false)
	{
		return new View($view, $title, $data);
	}

}