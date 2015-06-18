<?php

$luna = require 'bootstrap.php';

// $resource->path('path/to/resources/');

$app->get(['/', '/home'], ['view' => ['view' => 'Welcome', 'title' => 'Luna', 'data' => ['framework' => 'Luna', 'version' => 1.8]]]);

$app->get('/users', ['controller' => 'UsersController']);

$app->get('/repo', function() use($response)
{
	$response->redirect('https://github.com/Alewex/Luna');
});

$app->dispatch();
