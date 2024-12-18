<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signin');
});

Route::view('signup' , 'signup')->name('signup');

Route::get('home' , function (){
    return view('home');
});