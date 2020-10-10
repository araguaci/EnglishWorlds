<?php

declare(strict_types=1);

Auth::routes();

Route::get('/', 'StatusesController@index');
Route::get('tags/{tag}', 'StatusesController@index');
Route::post('/', 'StatusesController@store')->name('statuses');
Route::post('react', 'ReactsController@react')->name('react');
Route::post('upvote', 'StatusesController@upvote')->name('upvote');
Route::post('downvote', 'StatusesController@downvote')->name('downvote');
Route::get('{status}', 'StatusesController@show');
Route::post('{status}/comment', 'CommentsController@store')->name('post_comment');
