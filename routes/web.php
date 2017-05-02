<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', array(
    'uses' => 'HomeController@index',
    'as' => 'home',
));

Route::get('search', array(
    'uses' => 'SearchController@getResults',
    'as' => 'search.results',
));

Route::get('user/{username}', array(
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
));

Route::get('profile/edit', array(
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => array('auth'),
));

Route::post('profile/edit', array(
    'uses' => 'ProfileController@postEdit',
    'middleware' => array('auth'),
));

Route::get('friends', array(
    'uses' => 'FriendController@getIndex',
    'as' => 'friends.index',
    'middleware' => array('auth'),
));

Route::get('friends/add/{username}', array(
    'uses' => 'FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => array('auth'),
));

Route::get('friends/accept/{username}', array(
    'uses' => 'FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => array('auth'),
));

Route::post('friends/delete/{username}', array(
    'uses' => 'FriendController@postDelete',
    'as' => 'friend.delete',
    'middleware' => array('auth'),
));

/*
 * Statuses
 */

// Post statuses
Route::post('status', array(
    'uses' => 'StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => array('auth'),
));

Route::post('status/{statusId}/reply', array(
    'uses' => 'StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => array('auth'),
));

Route::get('status/{statusId}/like', array(
    'uses' => 'StatusController@getLike',
    'as' => 'status.like',
    'middleware' => array('auth'),
));

Route::get('status/{statusId}/delete', array(
    'uses' => 'StatusController@getDelete',
    'as' => 'status.delete',
    'middleware' => array('auth'),
));

Route::get('status', array(
    'uses' => 'StatusController@getStatus',
    'as' => 'status',
));
