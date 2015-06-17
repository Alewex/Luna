<?php

namespace Luna\Services\HTTP\Views;

use Luna\Services\Core\ResourceHandler;

class View
{

	public $view;
	public $data;
	public $title;

	public function __construct($view, $title, $data)
	{
		$this->view = $view;
		$this->data = $data;
		$this->title = $title;
		$this->resource = new ResourceHandler;

		$this->renderView();
	}

	public function renderView()
	{
		$path = $this->resource->getResourcePath('views/' . $this->view . '*');

		if ($this->viewExists($path))
		{
			require_once $path;

			return $this;
		}
	}

	public function viewExists($pathToView)
	{
		return (file_exists($pathToView) ? true : false);
	}

}