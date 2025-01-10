<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greet/{name}', function ($name) {
    return "Hello $name!";
});

Route::fallback(function () {
    return redirect()->route('root');
});

// GET
// POST
// PUT
// DELETE
