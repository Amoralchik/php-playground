@extends('layout.app')

@section('title', 'The list of tasks')

@section('content')
<div>
    <a href={{ route('tasks.create')}}> Create task </a>
    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
            <a href={{ route('tasks.show', ['id' => $task->id]) }}> {{$task->title}} </a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
    {{-- @else --}}
    {{-- @endif --}}
</div>
@endsection
