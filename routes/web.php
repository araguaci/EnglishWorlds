<?php

Route::get('/', 'StatusesController@index');
Route::post('/', 'StatusesController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{status}', 'StatusesController@show');

Route::post('/{status}/comment', 'CommentsController@store')->name('post_comment');
