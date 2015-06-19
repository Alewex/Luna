<?php

use Luna\Core\ServiceContainer as Service;

$db = require_once 'config/.database.php';

Service::register('Core', new Luna\Core\Luna());
Service::register('View', new Luna\Views\ViewHandler());
Service::register('Response', new Luna\HTTP\Response());
Service::register('Model', new Luna\Database\ModelHandler());
Service::register('Resource', new Luna\Core\ResourceHandler());
Service::register('Controller', new Luna\HTTP\Controllers\ControllerHandler());
Service::register('Fluent', new FluentPDO\FluentPDO(new PDO("mysql:host=$db[host];dbname=$db[db]", "$db[user]", "$db[password]")));

$app = Service::load('Core');
$view = Service::load('View');
$model = Service::load('Model');
$fluent = Service::load('Fluent');
$response = Service::load('Response');
$resource = Service::load('Resource');
$controller = Service::load('Controller');