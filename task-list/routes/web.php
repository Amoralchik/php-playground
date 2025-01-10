<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'name' => '<b>Piotr</b>'
    ]);
});

Route::get('/greet/{name}', function ($name) {
    return "Hello $name!";
});

Route::fallback(function () {
    return redirect()->route('index');
});

// GET
// POST
// PUT
// DELETE
