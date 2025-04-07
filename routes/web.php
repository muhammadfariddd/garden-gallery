<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/plants', function () {
    return view('pages.plants');
});

Route::get('/care-guide', function () {
    return view('pages.care-guide');
});

Route::get('/shop', function () {
    return view('pages.shop');
});
