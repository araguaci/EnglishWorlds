<?php

Route::get('/', [
  'uses' => '\English\Http\Controllers\HomeController@index',
  'as' => 'home',
  
]);
