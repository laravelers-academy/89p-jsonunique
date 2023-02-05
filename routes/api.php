<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('user/create', 'UserController@create');

Route::put('user/update', 'UserController@update');