<?php

/**
 * Home
 */

Route::get('/', [
  'uses' => '\English\Http\Controllers\HomeController@index',
  'as' => 'home',
]);

Route::get('/alerts', function(){
  return redirect()->route('home')->with('info', 'You have signed up!');
});

/**
 * Authentication
 */

Route::get('/signup', [
  'uses' => '\English\Http\Controllers\AuthController@getSignup',
  'as' => 'auth.signup',
  'middleware' => ['guest'],
]);

Route::post('/signup', [
  'uses' => '\English\Http\Controllers\AuthController@postSignup',
  'middleware' => ['guest'],
]);

Route::get('/signin', [
  'uses' => '\English\Http\Controllers\AuthController@getSignin',
  'as' => 'auth.signin',
  'middleware' => ['guest'],
]);

Route::post('/signin', [
  'uses' => '\English\Http\Controllers\AuthController@postSignin',
  'middleware' => ['guest'],
]);

Route::get('/signout', [
  'uses' => '\English\Http\Controllers\AuthController@getSignout',
  'as' => 'auth.signout',
]);

/**
 * Search
 */

Route::get('/search', [
  'uses' => '\English\Http\Controllers\SearchController@getResults',
  'as' => 'search.results',
]);

/**
 * User profile
 */

Route::get('/user/{username}', [
  'uses' => '\English\Http\Controllers\ProfileController@getProfile',
  'as' => 'profile.index',
]);

Route::get('/profile/edit', [
  'uses' => '\English\Http\Controllers\ProfileController@getEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
  'uses' => '\English\Http\Controllers\ProfileController@postEdit',
  'middleware' => ['auth'],
]);

/**
 * Friends
 */

Route::get('/friends', [
  'uses' => '\English\Http\Controllers\FriendController@getIndex',
  'as' => 'friend.index',
  'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}',[
  'uses' => '\English\Http\Controllers\FriendController@getAdd',
  'as' => 'friend.add',
  'middleware' => ['auth'],
]);
