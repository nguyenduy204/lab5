<!-- resources/views/movies/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm rounded-4 mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Edit Movie</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="poster" class="form-label">Poster</label>
                    <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
                    @if($movie->poster)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="intro" class="form-label">Introduction</label>
                    <textarea class="form-control" id="intro" name="intro" rows="4" required>{{ old('intro', $movie->intro) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="release_date" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date->format('Y-m-d')) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select class="form-select" id="genre_id" name="genre_id" required>
                        @foreach($genes as $gene)
                            <option value="{{ $gene->id }}" {{ $gene->id == $movie->genre_id ? 'selected' : '' }}>{{ $gene->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Movie</button>
            </form>
        </div>
    </div>
</div>
@endsection
