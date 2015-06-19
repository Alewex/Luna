<?php

namespace Luna\Database;

use FluentPDO\FluentPDO;
use Luna\Core\ServiceContainer as Service;

class Database {

	public function __construct()
	{
		return $this->fluent = Service::load('Fluent');
	}

}