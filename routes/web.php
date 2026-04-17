<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});
