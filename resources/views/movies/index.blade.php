@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Movies</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add New Movie</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('movies.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search movies..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    @if($movies->count())
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($movie->poster)
                            <img src="./storage/{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="No poster">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->intro, 100) }}</p>
                            <span class="badge bg-primary align-self-start">{{ $movie->gene->name }}</span>
                            <p class="text-muted mt-2 mb-4">{{ $movie->release_date->format('Y-m-d') }}</p>
                            <div class="mt-auto">
    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i> View
    </a>
    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </form>
</div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $movies->links('pagination::bootstrap-4') }}
        </div>
    @else
        <div class="alert alert-info mt-4">
            No movies found.
        </div>
    @endif
</div>
@endsection
