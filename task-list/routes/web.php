<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class Task {
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}

$tasks = [
    new Task(
        id: 1,
        title: 'Buy groceries',
        description: 'Task 1 description',
        long_description: 'Task 1 long description',
        completed: false,
        created_at: '2023-03-01 12:00:00',
        updated_at: '2023-03-01 12:00:00'
    ),
    new Task(
        id: 2,
        title: 'Sell old stuff',
        description: 'Task 2 description',
        long_description: null,
        completed: false,
        created_at: '2023-03-02 12:00:00',
        updated_at: '2023-03-02 12:00:00'
    ),
    new Task(
        id: 3,
        title: 'Learn programming',
        description: 'Task 3 description',
        long_description: 'Task 3 long description',
        completed: true,
        created_at: '2023-03-03 12:00:00',
        updated_at: '2023-03-03 12:00:00'
    ),
    new Task(
        id: 4,
        title: 'Take dogs for a walk',
        description: 'Task 4 description',
        long_description: null,
        completed: false,
        created_at: '2023-03-04 12:00:00',
        updated_at: '2023-03-04 12:00:00'
    ),
];

Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::fallback(function () {
    return redirect()->route('tasks.index');
});
