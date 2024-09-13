@extends('layouts.main')

@section('container')

<table class="table table-bordered">
    <thead class="table-dark">
    <tr>
        <td>Book Name</td>
        <td>Category Name</td>
        <td>Author Name</td>
        <td>Average Rating</td>
        <td>Voter</td>
    </tr>
    </thead>
    @foreach ($book as $b)
        <tr>
        <td>{{ $b->name }}</td>
        <td>{{ $b->category->name }}</td>
        <td>{{ $b->author->author }}</td>
        <td>{{ $b->average_rating }}</td>
        <td>{{ $b->voter }}</td>
        </tr>
        @endforeach
    
</table>

@endsection