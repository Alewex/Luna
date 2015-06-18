<?php

$luna = require 'bootstrap.php';

// $resource->path('path/to/resources/');

$app->get(['/', '/home'], function() use($app, $view)
{
	$view->render('Welcome', 'Luna', ['framework' => 'Luna', 'version' => 1.8, 'routes' => $app->router->collection->routes]);
});

$app->get('/users', ['controller' => 'UsersController']);

$app->get('/repo', function() use($response)
{
	$response->redirect('https://github.com/Alewex/Luna');
});

$app->dispatch();
