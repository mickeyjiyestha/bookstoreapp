@extends('layouts.main')

@section('container')

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Author Name</th>
            <th>Total Voters</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->author }}</td>
                <td>{{ $author->books_sum_voter }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
