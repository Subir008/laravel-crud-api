<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signin');
})->name('signin');

Route::view('signup' , 'signup')->name('signup');

Route::view('home' , 'home')->name('home');

Route::view('new-post' , 'new-post')->name('new-post');