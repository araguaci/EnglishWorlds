<?php

/**
 * @author Salim Djerbouh <tbitw31@gmail.com>
 * @version v0.1.1
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('signup', [
  'uses' => 'UserController@signup',
  'as' => 'signup'
]);

Route::get('dashboard', [
  'uses' => 'PostController@getDashboard',
  'as' => 'dashboard'
])->middleware('auth');

Route::post('signin', [
  'uses' => 'UserController@signin',
  'as' => 'signin'
]);

Route::post('/createpost', [
  'uses' => 'PostController@postCreatePost',
  'as' => 'post.create'
]);
