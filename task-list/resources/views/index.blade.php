@extends('layout.app')

@section('title', 'The list of tasks')

@section('content')
<div class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
    <a href={{ route('tasks.create')}}
    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
    > Create task </a>
    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
            <a href={{ route('tasks.show', ['task' => $task->id]) }}
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
            > {{$task->title}} </a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
    {{-- @else --}}
    {{-- @endif --}}
    <div>
    @if ($tasks->count())
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
    </div>
</div>
@endsection
