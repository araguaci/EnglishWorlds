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

Route::get('/delete-post/{post_id}', [
  'uses' => 'PostController@getDeletePost',
  'as' => 'post.delete',
  'middleware' => 'auth'
]);

Route::get('logout', [
  'uses' => 'UserController@getLogout',
  'as' => 'logout'
]);

Route::get('account', [
  'uses' => 'UserController@getAccount',
  'as' => 'account'
]);

Route::post('updateaccount', [
  'uses' => 'UserController@postSaveAccount',
  'as' => 'account.save'
]);

Route::post('edit', [
  'uses' => 'PostController@postEditPost',
  'as' => 'edit'
]);
