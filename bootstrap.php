<?php

require 'config/autoloader.php';

$service = new Luna\Services\Core\ServiceContainer();

$service->register('Core', new Luna\Services\Core\Luna());
$service->register('Response', new Luna\Services\HTTP\Response());
$service->register('View', new Luna\Services\HTTP\Views\ViewHandler());
$service->register('Resource', new Luna\Services\Core\ResourceHandler());
$service->register('Controller', new Luna\Services\HTTP\Controllers\ControllerHandler());
$service->register('Fluent', new FluentPDO\FluentPDO(new PDO("mysql:dbname=luna", "root")));

$app = $service->load('Core');
$view = $service->load('View');
$fluent = $service->load('Fluent');
$response = $service->load('Response');
$resource = $service->load('Resource');
$controller = $service->load('Controller');