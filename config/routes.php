<?php

/*
|-----------------------------------------------------------------------
|	Routes
|-----------------------------------------------------------------------
|
|	Declare here the routes so Luna can return it's responses when
|	they're requested.
|
*/
$app->get(['/', '/home'], function() use($app, $view)
{
	$view->render('Welcome', 'Luna', ['framework' => 'Luna', 'version' => 1.8, 'routes' => $app->router->collection->routes]);
});

$app->get('/users', ['controller' => 'UsersController']);

$app->get('/users/create', ['controller' => 'UsersController/Create']);

$app->post('/users/create', ['controller' => 'UsersController/CreateUser']);

$app->get('/repo', function() use($response)
{
	$response->redirect('https://github.com/Alewex/Luna');
});