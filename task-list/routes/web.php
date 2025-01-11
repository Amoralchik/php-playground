<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed', false)->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::fallback(function () {
    return redirect()->route('tasks.index');
});
