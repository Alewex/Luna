<?php

namespace Luna\Database;

class ModelHandler
{

	public function load($model)
	{
		return new Model($model);
	}

}