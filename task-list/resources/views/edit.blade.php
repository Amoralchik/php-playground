@extends('layout.app')

@section('title', 'Edit task')

@section('content')
<form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}" class="gap-2 flex flex-col">
    @csrf
    @method('PUT')
    <div>
        @error('title')
            <p class="text-red-600 text-xs"> {{ $message }} </p>
        @enderror

        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input text="text" name="title" id="title" value="{{$task->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div>
        @error('description')
            <p class="text-red-600 text-xs"> {{ $message }} </p>
        @enderror

        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea name="description" id="description" row="5"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >{{$task->description}}</textarea>
    </div>
    <div>
        @error('long_description')
            <p class="text-red-600 text-xs"> {{ $message }} </p>
        @enderror

        <label for="long_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Long description</label>
        <textarea name="long_description" id="long_description" row="10"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >{{$task->long_description}}</textarea>
    </div>
    <div>
        <button type="submit"
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        >Edit task!</button>
    </div>
</form>
@endsection
