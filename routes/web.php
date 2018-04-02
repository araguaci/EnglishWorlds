<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'StatusesController@index');
Route::post('/', 'StatusesController@store');
Route::get('/{status}', 'StatusesController@show');

Route::post('/{status}/comment', 'CommentsController@store')->name('post_comment');
