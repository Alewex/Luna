<?php

function __autoload($class)
{

	$path = '../vendor/' . $class . '.php';

	if (file_exists($path))
		require $path;

}