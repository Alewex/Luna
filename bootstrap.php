<?php

require 'config/autoloader.php';

$services = [
	'Core' => new Luna\Services\Core\Luna(),
	'Response' => new Luna\Services\HTTP\Response(),
	'View' => new Luna\Services\HTTP\Views\ViewHandler(),
	'Resource' => new Luna\Services\Core\ResourceHandler(),
	'Controller' => new Luna\Services\HTTP\Controllers\ControllerHandler()
];

$app = $services['Core'];
$view = $services['View'];
$response = $services['Response'];
$resource = $services['Resource'];
$controller = $services['Controller'];

return $services;