<?php

$luna = require 'bootstrap.php';

$app->get(['/', '/home'], function() use ($controller)
{
	$controller->load('WelcomeController');
});

$app->get('/users', function() use($controller)
{
	$controller->load('UsersController');
});

$app->dispatch();