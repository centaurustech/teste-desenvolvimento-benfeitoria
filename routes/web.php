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
Route::get('/',  ['as' => 'post.index',   'uses'   => 'Post\PostController@index']);

Route::prefix('/post')->group(function () {

 	Route::get('/detalhe/{id}',  ['as' => 'post.show',   'uses'   => 'Post\PostController@show']);
	Route::get('/novo',  		 ['as' => 'post.create', 'uses'   => 'Post\PostController@create']);
	Route::post('/salvar',		 ['as' => 'post.save',   'uses'   => 'Post\PostController@save']);
	Route::get('/edit', 		 ['as' => 'post.edit',   'uses'   => 'Post\PostController@edit']);
});

/*API's*/
Route::prefix('/api')->group(function () {

	// API FOR TAGS
	Route::get('tags/{id?}', 'Tag\TagController@indexAPI');
	Route::post('tags/add', 'Tag\TagController@add');

	// API FOR AUTHORS
	Route::get('authors/{id?}', 'Author\AuthorController@indexAPI');
	Route::post('author/add', 'Author\AuthorController@add');

});