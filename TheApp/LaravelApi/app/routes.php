<?php

/**
 * users
 *
 * GET only for a user's
 *     tasks and comments
 */
Route::group(['prefix' => 'users'], function()
{
    Route::get(    "/",                   ['as' => 'users.index',          'uses' => 'UsersController@index'] );
    Route::post(   "/",                   ['as' => 'users.store',          'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{user_id}",          ['as' => 'users.show',           'uses' => 'DummyController@respondOk'] );
    Route::patch(  "/{user_id}",          ['as' => 'users.update',         'uses' => 'DummyController@respondOk'] );
    Route::delete( "/{user_id}",          ['as' => 'users.destroy',        'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{user_id}/tasks",    ['as' => 'users.tasks.index',    'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{user_id}/comments", ['as' => 'users.comments.index', 'uses' => 'DummyController@respondOk'] );
});


/**
 * tasks
 *
 * GET and POST for a task's
 *     tags and comments
 */
Route::group(['prefix' => 'tasks'], function()
{
    Route::get(    "/",                   ['as' => 'tasks.index',          'uses' => 'DummyController@respondOk'] );
    Route::post(   "/",                   ['as' => 'tasks.store',          'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{task_id}",          ['as' => 'tasks.show',           'uses' => 'DummyController@respondOk'] );
    Route::patch(  "/{task_id}",          ['as' => 'tasks.update',         'uses' => 'DummyController@respondOk'] );
    Route::delete( "/{task_id}",          ['as' => 'tasks.destroy',        'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{task_id}/tags",     ['as' => 'tasks.tags.index',     'uses' => 'DummyController@respondOk'] );
    Route::post(   "/{task_id}/tags",     ['as' => 'tasks.tags.store',     'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{task_id}/comments", ['as' => 'tasks.comments.index', 'uses' => 'DummyController@respondOk'] );
    Route::post(   "/{task_id}/comments", ['as' => 'tasks.comments.store', 'uses' => 'DummyController@respondOk'] );
});

/**
 * task-groups
 */
Route::group(['prefix' => 'task-groups'], function()
{
    Route::get(    "/",                ['as' => 'task_groups.index',       'uses' => 'DummyController@respondOk'] );
    Route::post(   "/",                ['as' => 'task_groups.store',       'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{task_group_id}", ['as' => 'task_groups.show',        'uses' => 'DummyController@respondOk'] );
    Route::patch(  "/{task_group_id}", ['as' => 'task_groups.update',      'uses' => 'DummyController@respondOk'] );
    Route::delete( "/{task_group_id}", ['as' => 'task_groups.destroy',     'uses' => 'DummyController@respondOk'] );
});

/**
 * tags
 */
Route::group(['prefix' => 'tags'], function()
{
    Route::get(    "/",         ['as' => 'tags.index',                     'uses' => 'DummyController@respondOk'] );
    Route::post(   "/",         ['as' => 'tags.store',                     'uses' => 'DummyController@respondOk'] );
    Route::get(    "/{tag_id}", ['as' => 'tags.show',                      'uses' => 'DummyController@respondOk'] );
    Route::patch(  "/{tag_id}", ['as' => 'tags.update',                    'uses' => 'DummyController@respondOk'] );
    Route::delete( "/{tag_id}", ['as' => 'tags.destroy',                   'uses' => 'DummyController@respondOk'] );
});

/**
 * comments
 */
Route::group(['prefix' => 'comments'], function()
{
    Route::get(    "/",             ['as' => 'comments.index',             'uses' => 'DummyController@respondOk'] );
    Route::delete( "/{comment_id}", ['as' => 'comments.destroy',           'uses' => 'DummyController@respondOk'] );
});



Route::get('/', function()
{
    $data = ["message" => "Hello World welcome"];
    return Response::json($data);
});