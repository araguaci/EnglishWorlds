<?php

/**
 * Home
 */

Route::get('/', [
  'uses' => '\English\Http\Controllers\HomeController@index',
  'as' => 'home',
]);

Route::get('/alerts', function() {
  return redirect()->route('home')->with('info', 'You have signed up!');
});

/**
 * Authentication
 */

Route::get('/signup', [
  'uses' => '\English\Http\Controllers\AuthController@getSignup',
  'as' => 'auth.signup',
]);

Route::post('/signup', [
  'uses' => '\English\Http\Controllers\AuthController@postSignup',
]);
