@extends('layouts.main')

@section('container')

<h2>Input Rating</h2>

<form method="POST" action="{{ route('rating.store') }}">
    @csrf


    <div class="form-group">
        <label for="book_id">Book Name:</label>
        <select name="book_id" id="book_id" class="form-control" required>
            <option value="">Select a Book</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->name }} (Rating: {{ $book->average_rating }})</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="author_id">Author Name:</label>
        <select name="author_id" id="author_id" class="form-control" required>
            <option value="">Select an Author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->author }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" class="form-control" required>
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
