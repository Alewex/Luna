<?php

namespace Luna\Services\Database;

use FluentPDO\FluentPDO;
use Luna\Services\Core\ServiceContainer as Services;

class Database {

	public function __construct()
	{
		$this->services = new Services;

		return $this->fluent = $this->services->load('Fluent');
	}

}