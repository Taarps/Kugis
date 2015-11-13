<?php

Route::get('/', 'Auth\AuthController@getLogin');

// Autentifikācija
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', [
	'as'	=> 'login-post',
	'uses'	=> 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
	'as'	=> 'logout',
	'uses'	=> 'Auth\AuthController@getLogout'
]);



// Reģistrācija
Route::get('auth/register', [
	'as'	=> 'auth-register',
	'uses'	=> 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', 'Auth\AuthController@postRegister');




/*
	Parts categroy
*/
Route::get('parts-category', [
	'middleware' => 'auth',
	'as'	=> 'parts-category',
	'uses'	=> 'PartsCategoryController@tablePage'
]);

Route::post('parts-category.table', [
	'middleware' => 'auth',
	'uses'	=> 'PartsCategoryController@table'
]);

Route::get('parts-category.item-panel', [
	'middleware' => 'auth',
	'uses'	=> 'PartsCategoryController@itemPanel'
]);

Route::post('parts-category.add-item', [
	'middleware' => 'auth',
	'uses'	=> 'PartsCategoryController@addItem'
]);
/*		END parts category 		*/



/*
	Parts
*/
Route::get('parts', [
	'middleware' => 'auth',
	'as'	=> 'parts',
	'uses'	=> 'PartsController@tablePage'
]);

Route::post('parts.table', [
	'middleware' => 'auth',
	'as'	=> 'parts-table',
	'uses'	=> 'PartsController@table'
]);

Route::post('parts.category-list', [
	'middleware' => 'auth',
	'as'	=> 'category-list',
	'uses'	=> 'PartsCategoryController@listBox'
]);

Route::get('parts.item-modal', [
	'middleware' => 'auth',
	'as'	=> 'parts-item-modal',
	'uses'	=> 'PartsController@itemModal'
]);

Route::get('parts.add-item', [
	'middleware' => 'auth',
	'as'	=> 'parts-add-item',
	'uses'	=> 'PartsController@addItem'
]);
/*		END parts 		*/



/*
	Users
*/
Route::get('users', [
	'middleware' => 'auth',
	'as'	=> 'users',
	'uses'	=> 'UsersController@tablePage'
]);

Route::post('users.table', [
	'middleware' => 'auth',
	'as'	=> 'users-table',
	'uses'	=> 'UsersController@table'
]);


Route::get('users.last_name', [
	'middleware' => 'auth',
	'uses'	=> 'UsersController@getLastName'
]);

Route::get('users.set_last_name', [
	'middleware' => 'auth',
	'uses'	=> 'UsersController@setLastName'
]);

Route::get('users.first_name', [
	'middleware' => 'auth',
	'uses'	=> 'UsersController@getFirstName'
]);

Route::get('users.set_first_name', [
	'middleware' => 'auth',
	'uses'	=> 'UsersController@setFirstName'
]);
/*		END parts 		*/