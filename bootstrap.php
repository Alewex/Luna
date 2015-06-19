<?php

/*
|-----------------------------------------------------------------------
|	autoloader.php
|-----------------------------------------------------------------------
|
|	This autoloader takes care of loading all the required classes
|	inside the vendor folder.
|
*/
require_once 'config/autoloader.php';

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
