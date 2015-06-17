<?php

namespace Luna\Services\Database;

class ModelHandler
{

	public function load($model)
	{
		return new Model($model);
	}

}