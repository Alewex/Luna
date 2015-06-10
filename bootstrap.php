<?php

require 'config/autoloader.php';

$services = [
	'Core' => new Luna\Services\Core\Luna(),
	'Response' => new Luna\Services\HTTP\Response()
];

return $services;