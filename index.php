<?php

$luna = require 'bootstrap.php';

// $resource->path('resources/');

$app->get(['/', '/home'], function() use ($controller)
{
	$controller->load('WelcomeController');
});

$app->dispatch();