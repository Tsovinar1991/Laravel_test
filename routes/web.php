<?php
Auth::routes();

Route::post('/home/search', 'HomeController@search');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@index');
Route::get('/profile/{id}/edit', 'UserController@edit');
Route::put('/profile/update', 'UserController@update');


//index, about, services
Route::get('/','PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


//Posts resource route
Route::resource('posts', 'PostsController');

Route::get('activation/{key}', 'Auth\RegisterController@activation');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');









