@extends('layout.app')

@section('title', $task->title)

@section('content')
    <div class="gap-2 flex flex-col">
        <p> {{$task->description}} </p>

        @if ($task->long_description)
            <p> {{$task->long_description}} </p>
        @endif

    <div class="gap-2 flex justify-between">
        <p> Created: {{$task->created_at}} </p>
        <p> Updated: {{$task->updated_at}} </p>
    </div>

    <div class="flex items-center">
    <form action="{{ route('tasks.complete', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <button
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'complete' }}
        </button>
    </form>
    </div>

    <div class="flex justify-between">
        <a
        class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        href="{{ route('tasks.edit', ['task' => $task->id]) }}">edit</a>
        <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit"
            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
            > Delete </button>
        </form>
    </div>
@endsection
