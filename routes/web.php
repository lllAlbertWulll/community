<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostsController@index');

// Posts Routes
Route::resource('discussions', 'PostsController');
Route::post('/post/upload', 'PostsController@upload');

// Comments Routes
Route::resource('comments', 'CommentsController');

// User Routes
Route::get('/user/register', 'UsersController@register');
Route::get('/user/login', 'UsersController@login')->name('login');
Route::get('/user/avatar', 'UsersController@avatar');
Route::get('/verify/{confirm_code}', 'UsersController@confirmEmail');
Route::post('/user/register', 'UsersController@store');
Route::post('/user/login', 'UsersController@signin');
Route::post('/avatar', 'UsersController@changeAvatar');
Route::post('crop/api', 'UsersController@cropAvatar');

Route::get('/logout', 'UsersController@logout');