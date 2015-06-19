<?php

namespace Luna\Views;

use Luna\Views\View;

class ViewHandler
{

	public function render($view = false, $title = false, $data = false)
	{
		return new View($view, $title, $data);
	}

}