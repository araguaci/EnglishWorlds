<?php

Auth::routes();

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home',
]);

Route::get('search', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results',
]);

Route::get('user/{username}', [
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
]);

Route::get('profile/edit', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth'],
]);

Route::post('profile/edit', [
    'uses' => 'ProfileController@postEdit',
    'middleware' => ['auth'],
]);

Route::get('userimage/{filename}', [
    'uses' => 'ProfileController@getUserImage',
    'as' => 'account.image',
]);

Route::get('friends', [
    'uses' => 'FriendController@getIndex',
    'as' => 'friends.index',
    'middleware' => ['auth'],
]);

Route::get('friends/add/{username}', [
    'uses' => 'FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth'],
]);

Route::get('friends/accept/{username}', [
    'uses' => 'FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth'],
]);

Route::post('friends/delete/{username}', [
    'uses' => 'FriendController@postDelete',
    'as' => 'friend.delete',
    'middleware' => ['auth'],
]);

/*
 * Statuses
 */

// Post statuses
Route::post('status', [
    'uses' => 'StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth'],
]);

Route::post('status/{statusId}/reply', [
    'uses' => 'StatusController@postReply',
    'middleware' => ['auth'],
]);

Route::get('status/{statusId}/like', [
    'uses' => 'StatusController@getLike',
    'as' => 'status.like',
    'middleware' => ['auth'],
]);

Route::get('status/{statusId}/delete', [
    'uses' => 'StatusController@getDelete',
    'as' => 'status.delete',
    'middleware' => ['auth'],
]);

Route::get('status', [
    'uses' => 'StatusController@getStatus',
    'as' => 'status',
    'middleware' => ['auth'],
]);
