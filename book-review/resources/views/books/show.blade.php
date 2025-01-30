@extends('layout.app')

@section('title', $book->title)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white shadow-lg rounded-lg p-4">

                <div class="border-b flex flex-col gap-4 mb-8">
                    <h1 class="text-6xl font-black text-center uppercase text-gray-900">@yield('title')</h1>

                    <div>
                        <h2 class="text-xl font-bold mb-2 text-gray-800">Book Details</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-600 mb-2 text-sm">Author: {{ $book->author }}</p>
                            <p class="text-gray-600 mb-2 text-sm">Published: {{ $book->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl font-bold mb-4">Reviews</h3>

                @foreach($book->reviews as $review)
                    <div class="flex items-center border-b pb-2 mb-2">
                        <div class="w-full">
                            <p>{{ $review->review }}</p>
                            <div class="mt-2 flex justify-between items-center">
                                <h2 class="text-sm font-bold">{{ $review->rating }} / 5</h2>
                                <small class="text-gray-600">{{ $review->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
