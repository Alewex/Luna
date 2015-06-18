<?php

$luna = require 'bootstrap.php';

// $resource->path('path/to/resources/');

<<<<<<< HEAD
$app->get(['/', '/home'], ['view' => ['view' => 'Welcome', 'title' => 'Luna', 'data' => ['framework' => 'Luna', 'version' => 1.8]]]);

$app->get('/users', ['controller' => 'UsersController']);
=======
$app->get(['/', '/home'], function() use ($controller)
{
	$controller->load('WelcomeController');
});
>>>>>>> 63160d15cc10c09d0f5e0e8cf98622b587b0a952

$app->get('/repo', function() use($response)
{
	$response->redirect('https://github.com/Alewex/Luna');
});

$app->dispatch();
