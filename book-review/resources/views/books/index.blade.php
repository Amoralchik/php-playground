@extends('layout.app')

@section('title', 'Books List')

@section('content')
<form method="get" action="{{ route('books.index') }}" class="space-x-4 flex items-center">
    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-800">Clear</a>
    <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}" class="border border-gray-300 rounded-lg shadow-md px-4 py-2 w-full focus:outline-none focus:border-blue-500" />
    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">Search</button>
</form>

<div class="flex items-center justify-center gap-4 p-2 rounded-lg">
    @php
        $filters = [
            '' => 'Latest',
            'popular_last_month' => 'Popular Last Month',
            'popular_last_6months' => 'Popular Last 6 Month',
            'highest_rated_last_month' => 'Highest Rated Last Month',
            'highest_rated_last_6months' => 'Highest Rated Last 6 Month',
        ];

        $isFilterActive = fn (string $key) => request('filter') === $key || (request('filter') === null && $key === '');
    @endphp

    @foreach ($filters as $key => $label)
        <a
            href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
            class="px-4 py-2 {{ $isFilterActive($key) ? 'text-blue-500 hover:text-blue-800' : 'text-gray-600 hover:text-gray-800' }} bg-white rounded-lg"
        >
            {{ $label }}
        </a>
    @endforeach
</div>

<ul class="grid grid-cols-1 gap-4 items-center justify-center w-full mx-auto max-w-2xl">
    @forelse ($books as $book)
    <a href="{{ route('books.show', ['book' => $book]) }}">
        <li class="col-span-1 w-full bg-white rounded-md p-4 shadow-md flex flex-col">
            <h3 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h3>
            <h4 class="text-base font-medium text-gray-600">by {{ $book->author ?? 'Unknown Author' }}</h4>
            <div class="flex justify-between items-center mt-2">
                <p class="text-base font-medium text-gray-600">Rating: {{ number_format($book->reviews_avg_rating, 1)}}</p>
                <p class="text-base font-medium text-gray-600">out of {{ $book->reviews_count }}</p>
            </div>
        </li>
    </a>
    @empty
        <div class="text-center text-gray-600 mt-4">
            <h2 class="font-bold text-xl">No books found</h2>
        </div>
    @endforelse
</ul>

@endsection
