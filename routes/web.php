<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/hello/world', function() use ($app) {
	return "Hello world!";
});

$app->get('/hello/{name}', function($name) use ($app) {
	return "Hello ".$name;
});



// curl -I -XPOST http://lumen-book.local/hello/world
