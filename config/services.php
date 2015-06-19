<?php

$db = require_once 'config/.database.php';

$service = new Luna\Core\ServiceContainer();

$service->register('Core', new Luna\Core\Luna());
$service->register('View', new Luna\Views\ViewHandler());
$service->register('Response', new Luna\HTTP\Response());
$service->register('Model', new Luna\Database\ModelHandler());
$service->register('Resource', new Luna\Core\ResourceHandler());
$service->register('Controller', new Luna\HTTP\Controllers\ControllerHandler());
$service->register('Fluent', new FluentPDO\FluentPDO(new PDO("mysql:host=$db[host];dbname=$db[db]", "$db[user]", "$db[password]")));

$app = $service->load('Core');
$view = $service->load('View');
$model = $service->load('Model');
$fluent = $service->load('Fluent');
$response = $service->load('Response');
$resource = $service->load('Resource');
$controller = $service->load('Controller');