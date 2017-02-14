<?php

 Route::get('/', [
   'uses' => '\laravel\Http\Controllers\HomeController@index',
   'as' => 'home',
 ]);
