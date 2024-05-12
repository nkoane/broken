<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root');
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

Route::get('/work', function () {
    return view('work');
})->name('work.index');
