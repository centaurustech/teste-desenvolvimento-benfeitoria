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

Route::get('/',  ['as' => 'post.index', 'uses' => 'Post\PostController@index']);
Route::get('/post/novo', ['as' => 'post.create', 'uses' => 'Post\PostController@create']);
Route::post('/post/salvar', ['as' => 'post.save', 'uses' => 'Post\PostController@save']);

Route::get('/post/edit', ['as' => 'post.edit', 'uses' => 'Post\PostController@edit']);
