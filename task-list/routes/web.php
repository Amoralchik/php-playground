<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed', false)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:500'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = false;
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::fallback(function () {
    return redirect()->route('tasks.index');
});
