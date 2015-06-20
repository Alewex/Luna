<?php

namespace Luna\Views;

use Luna\Core\ServiceContainer as Service;

class View
{

	public $view;
	public $data;
	public $title;

	public function __construct($view, $title = false, $data = false)
	{
		$this->view = $view;
		$this->data = $data;
		$this->title = $title;
		$this->resource = Service::load('Resource');

		$this->renderView();
	}

	public function renderView()
	{
		$path = $this->resource->getResourcePath('views/' . $this->view . '.*');

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