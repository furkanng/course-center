<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.pages.home');
});

Route::get('/admin', function () {
    return view('panel.pages.home');
});
