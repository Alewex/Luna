<?php

/*
|-----------------------------------------------------------------------
|	Composer autoload
|-----------------------------------------------------------------------
|
|	This is the autoloader file provided by composer.
|
*/
require_once 'vendor/autoload.php';

/*
|-----------------------------------------------------------------------
|	services.php
|-----------------------------------------------------------------------
|
|	This file contains all the necesary services to run Luna, you can
|	register yours and then load them anywhere in the app.
|
*/
require_once 'config/services.php';

/*
|-----------------------------------------------------------------------
|	routes.php
|-----------------------------------------------------------------------
|
|	The routes.php file contains your application routes.
|
*/
require_once 'config/routes.php';

/*
|-----------------------------------------------------------------------
|	Application root.
|-----------------------------------------------------------------------
|
|	This sets the application root to the current root directory.
|
*/
$_SERVER['ROOT'] = rtrim($_SERVER['SCRIPT_NAME'], 'index.php/');
