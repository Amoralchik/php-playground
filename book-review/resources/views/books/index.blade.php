@extends('layout.app')

@section('title', 'Books list')

@section('content')

<ul class="grid grid-col grid-cols-2 gap-4 items-center justify-center">
    @forelse ($books as $book)
        <li class="w-full bg-white rounded-md">
            <div class="flex justify-between p-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h3>
                    <h4 class="text-base font-medium text-gray-600">by {{ $book->author ?? 'Unknown Author' }}</h4>
                </div>
                <div>
                    <p class="text-base font-medium text-gray-600">Rating: {{ optional($book->reviews_avg)->average ?? 0 }}</p>
                    <p class="text-base font-medium text-gray-600">Reviews: {{ $book->reviews_count ?? 'No Reviews' }}</p>
                </div>
            </div>
        </li>
    @empty
        <div class="text-center text-gray-600">
            <h2 class="font-bold text-xl">No books found</h2>
        </div>
    @endforelse
</ul>

@endsection

