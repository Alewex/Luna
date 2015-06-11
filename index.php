<?php

$luna = require 'bootstrap.php';

// $resource->path('resources/');

$app->get(['/', '/home'], function()
{
	echo "Welcome!";
});

$app->dispatch();