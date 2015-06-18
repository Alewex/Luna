<?php

namespace Luna\HTTP\Views;

use Luna\HTTP\Views\View;

class ViewHandler
{

	public function render($view = false, $title = false, $data = false)
	{
		return new View($view, $title, $data);
	}

}