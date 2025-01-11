@extends('layout.app')

@section('title', 'Create task')

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    @if (count($errors))
        {{ $errors }}
    @endif
    <div>
        <label for="title">Title</label>
        <input text="text" name="title" id="title" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" row="5"></textarea>
    </div>
    <div>
        <label for="long_description">Long description</label>
        <textarea name="long_description" id="long_description" row="10"></textarea>
    </div>
    <div>
        <button type="submit">Create task!</button>
    </div>
</form>
@endsection
