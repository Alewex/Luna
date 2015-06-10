<?php

require 'config/autoloader.php';

$services = [
	'Core' => new Luna\Services\Core\Luna(),
	'Response' => new Luna\Services\HTTP\Response(),
	'Resource' => new Luna\Services\Core\ResourceHandler()
];

$app = $services['Core'];
$response = $services['Response'];
$resource = $services['Resource'];

return $services;