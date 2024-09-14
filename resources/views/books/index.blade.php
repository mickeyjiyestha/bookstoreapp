@extends('layouts.main')

@section('container')


<form method="GET" action="{{ route('books.index') }}">
    <div class="form-group">
        <label for="list">List shown :</label>
        <select name="list" id="list" class="form-control">
            @for ($i = 10; $i <= 100; $i += 10)
                <option value="{{ $i }}" {{ $listShow == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">

        <label for="search">Search :</label>
        <input type="text" name="search" id="search" value="{{ $search }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>
</form>


<table class="table table-bordered mt-3">
    <thead class="table-dark">
    <tr>
        <td>No</td>
        <td>Book Name</td>
        <td>Category Name</td>
        <td>Author Name</td>
        <td>Average Rating</td>
        <td>Voter</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($books as $index => $b)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $b->name }}</td>
        <td>{{ $b->category->name }}</td>
        <td>{{ $b->author->author }}</td>
        <td>{{ $b->average_rating }}</td>
        <td>{{ $b->voter }}</td>
        </tr>
    @endforeach
    </tbody>
</table>



@endsection
