<?php

namespace Luna\Database;

use FluentPDO\FluentPDO;
use Luna\Core\ServiceContainer as Services;

class Database {

	public function __construct()
	{
		$this->services = new Services;

		return $this->fluent = $this->services->load('Fluent');
	}

}