@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4">
                @if($movie->poster)
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="img-fluid rounded-start" style="object-fit: cover; height: 100%; width: 100%;">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body p-4">
                    <h1 class="card-title mb-3 text-primary">{{ $movie->title }}</h1>
                    <p class="card-text mb-2"><strong>Genre:</strong> <span class="badge bg-secondary">{{ $movie->gene->name }}</span></p>
                    <p class="card-text mb-2"><strong>Introduction:</strong> {{ $movie->intro }}</p>
                    <p class="card-text mb-2"><strong>Release Date:</strong> {{ $movie->release_date->format('F j, Y') }}</p>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Back to Movies
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
