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
    </div>
@endsection
