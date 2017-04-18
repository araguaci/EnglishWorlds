<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [
  'uses' => 'HomeController@index',
  'as' => 'home'
]);

Route::get('search', [
  'uses' => '\English\Http\Controllers\SearchController@getResults',
  'as' => 'search.results'
]);

Route::get('user/{username}', [
  'uses' => '\English\Http\Controllers\ProfileController@getProfile',
  'as' => 'profile.index'
]);

Route::get('profile/edit', [
  'uses' => '\English\Http\Controllers\ProfileController@getEdit',
  'as' => 'profile.edit',
  'middleware' => ['auth']
]);

Route::post('profile/edit', [
  'uses' => '\English\Http\Controllers\ProfileController@postEdit',
  'middleware' => ['auth']
]);

Route::get('friends', [
  'uses' => '\English\Http\Controllers\FriendController@getIndex',
  'as' => 'friends.index',
  'middleware' => ['auth']
]);

Route::get('friends/add/{username}',[
  'uses' => '\English\Http\Controllers\FriendController@getAdd',
  'as' => 'friend.add',
  'middleware' => ['auth']
]);

Route::get('friends/accept/{username}', [
  'uses' => '\English\Http\Controllers\FriendController@getAccept',
  'as' => 'friend.accept',
  'middleware' => ['auth']
]);

Route::post('friends/delete/{username}', [
  'uses' => '\English\Http\Controllers\FriendController@postDelete',
  'as' => 'friend.delete',
  'middleware' => ['auth']
]);
/**
 * Statuses
 */

Route::post('status', [
  'uses' => '\English\Http\Controllers\StatusController@postStatus',
  'as' => 'status.post',
  'middleware' => ['auth']
]);

Route::post('status/{statusId}/reply', [
  'uses' => '\English\Http\Controllers\StatusController@postReply',
  'as' => 'status.reply',
  'middleware' => ['auth']
]);

Route::get('status/{statusId}/like', [
  'uses' => '\English\Http\Controllers\StatusController@getLike',
  'as' => 'status.like',
  'middleware' => ['auth']
]);
