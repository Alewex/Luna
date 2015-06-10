<?php

$luna = require 'bootstrap.php';

$app = $luna['Core'];
$response = $luna['Response'];

$app->get('/', function()
{
	echo "Welcome!";
});

$app->get('/calendar', function()
{
	echo "Calendar page.";
});

$app->get('/contact', function()
{
	echo "Contact page.";
});

$app->get('/about', function()
{
	echo "About page.";
});

$app->get('/404', function() use($response)
{
	$response->code(404);
	echo "<b>DEMO</b> Page not found.";
});

$app->dispatch();