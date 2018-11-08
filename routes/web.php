<?php
Auth::routes();
Route::get('home/list', 'HomeController@showlist');
Route::post('/home/search', 'HomeController@search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');


Route::get('activation/{key}', 'Auth\RegisterController@activation');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('article/{id}/edit', 'ArticleController@edit');






