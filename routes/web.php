<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root');
});

Route::get('/bio', function () {
    return view('bio');
});

Route::get('/tags', function () {
    return view('tags');
});
