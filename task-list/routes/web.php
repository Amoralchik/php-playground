<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed', false)->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'form')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('form', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.delete');

Route::fallback(function () {
    return redirect()->route('tasks.index');
});
