@extends('layout.app')

@section('title', 'Create Review for: ' . $book->title)

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Create Review for: {{ $book->title }}</h1>
    <form action="{{ route('books.reviews.store', ['book' => $book]) }}" method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
            <textarea id="review" name="review" rows="3" required class="mt-1 block w-full p-2 border rounded-md"></textarea>
        </div>

        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <select name="rating" id="rating" class="mt-1 block w-full p-2 border rounded-md">
                <option value="">Select a Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Submit</button>
    </form>
</div>
@endsection()
