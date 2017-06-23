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



Route::get('userimage/{filename}', [
    'uses' => 'ProfileController@getUserImage',
    'as' => 'account.image',
]);


Route::middleware(['auth'])->group(function () {
    Route::get('profile/edit', [
        'uses' => 'ProfileController@getEdit',
        'as' => 'profile.edit',
    ]);

    Route::post('profile/edit', [
        'uses' => 'ProfileController@postEdit',
    ]);
    Route::get('friends', [
        'uses' => 'FriendController@getIndex',
        'as' => 'friends.index',
    ]);

    Route::get('friends/add/{username}', [
        'uses' => 'FriendController@getAdd',
        'as' => 'friend.add',
    ]);

    Route::get('friends/accept/{username}', [
        'uses' => 'FriendController@getAccept',
        'as' => 'friend.accept',
    ]);

    Route::post('friends/delete/{username}', [
        'uses' => 'FriendController@postDelete',
        'as' => 'friend.delete',
    ]);
});
/*
 * Statuses
 */

// Post statuses
Route::middleware(['auth'])->group(function () {
    Route::post('status', [
        'uses' => 'StatusController@postStatus',
        'as' => 'status.post'
    ]);

    Route::post('status/{statusId}/reply', [
        'uses' => 'StatusController@postReply',
        'as' => 'status.comment'
    ]);

    Route::get('status/{statusId}/like', [
        'uses' => 'StatusController@getLike',
        'as' => 'status.like'
    ]);

    Route::get('status/{statusId}/delete', [
        'uses' => 'StatusController@getDelete',
        'as' => 'status.delete'
    ]);

    Route::get('status', [
        'uses' => 'StatusController@getStatus',
        'as' => 'status'
    ]);
});
/*
 * Chat
 */
 Route::group(['prefix' => 'chat'], function () {
     Route::get('send', 'ChatController@send');
     Route::get('update', 'ChatController@update');
     Route::get('{correspondent}', 'ChatController@show');
 });
