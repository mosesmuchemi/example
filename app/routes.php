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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::group(['prefix' => 'api/v1'],function()
{
	Route::get('lessons/{id}/tags', 'TagsController@index');

	Route::resource('lessons', 'LessonsController');

	Route::resource('tags', 'TagsController', ['only' => ['index','show']]);

});


Route::group(array('prefix' => 'api/v1'), function()
{
	Route::resource('contacts', 'ContactsController');
	Route::delete('contacts/{id}/restore', 'ContactsController@restore');
	Route::put('contacts/{id}/archive', 'ContactsController@archive');
});
