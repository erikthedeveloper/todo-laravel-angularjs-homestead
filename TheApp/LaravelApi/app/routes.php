<?php

Route::get('/', function()
{
    $data = [
        "message" => "Hello World welcome"
    ];
	return Response::json($data);
});
