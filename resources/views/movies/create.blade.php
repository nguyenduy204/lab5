<!-- resources/views/movies/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Movie</h1>

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="intro" class="form-label">Introduction</label>
            <textarea class="form-control" id="intro" name="intro" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                @foreach($genes as $gene)
                    <option value="{{ $gene->id }}">{{ $gene->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection
