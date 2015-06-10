<?php

$luna = require 'bootstrap.php';

$app->get(['/', '/home'], function()
{
	echo "Welcome!";
});

$app->dispatch();