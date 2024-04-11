<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bio', function () {
    return view('bio');
});

Route::get('/posts', function () {
    return ['posts' => ['an Alter Native.', 'an Alter Native.']];
});
