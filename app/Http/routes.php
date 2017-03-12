<?php

Route::get('/', [
  'uses' => '\English\Http\Controllers\HomeController@index',
  'as' => 'home',
]);

Route::get('/alerts', function() {
  return redirect()->route('home')->with('info', 'You have signed up!');
});
