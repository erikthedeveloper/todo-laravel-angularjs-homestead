<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/users/', function()
{
	$users = [
		['id' => 1, 'name' => 'Kasey Cowley'],
		['id' => 2, 'name' => 'Erik Aybar'],
		['id' => 3, 'name' => 'Foo Bar'],
	];

	return Response::json($users);
});

Route::get('/users/{id}', function ($id) {
	return Response::json(['id' => 2, 'name' => 'Erik Aybar']);
});
