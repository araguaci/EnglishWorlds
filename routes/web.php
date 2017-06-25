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

Route::get('userimage/{username}', [
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
    Route::get('friends/delete/{username}', function(){
      return back();
    });
    /*
     * Statuses
     */

    // Post statuses
    Route::post('status', [
        'uses' => 'StatusController@postStatus',
        'as' => 'status.post'
    ]);
    // Get statuses
    Route::get('status', [
        'uses' => 'StatusController@getStatus',
        'as' => 'status'
    ]);
    // Comment on statuses
    Route::post('status/{statusId}/reply', [
        'uses' => 'StatusController@postReply',
        'as' => 'status.comment'
    ])->where('statusId', '[0-9]+');

    Route::get('status/{statusId}/reply', function(){
      return redirect('login');
    });
    // Like a status
    Route::get('status/{statusId}/like', [
        'uses' => 'StatusController@getLike',
        'as' => 'status.like'
    ])->where('statusId', '[0-9]+');
    // Delete a status
    Route::get('status/{statusId}/delete', [
        'uses' => 'StatusController@getDelete',
        'as' => 'status.delete'
    ])->where('statusId', '[0-9]+');
    /*
     * Chat
     */
     Route::group(['prefix' => 'chat'], function () {
         Route::get('send', 'ChatController@send');
         Route::get('update', 'ChatController@update');
         Route::get('{correspondent}', 'ChatController@show');
     });
});
