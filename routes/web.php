<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.pages.home');
});

Route::get('/yonetim', function () {
    return view('panel.pages.home');
});
