@extends('layout')
@section('content')
<div class="container py-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" style="border-radius: 15px;" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Movie Collection</h2>
        <a href="{{ route('movies.form') }}" class="btn btn-danger rounded-pill px-4" style="background-color: #000000; border: none;">
            <i class="fas fa-plus me-2"></i>Add new movie
        </a>
    </div>

    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm"
                    style="border-radius: 20px; transition: all 0.3s ease; background: rgba(255, 255, 255, 0.9);">
                    <img src="{{ asset('storage/' . $movie->photo) }}"
                        class="card-img-top"
                        alt="{{ $movie->title }}"
                        style="height: 350px; object-fit: cover; border-radius: 20px 20px 0 0;">
                    <div class="card-body d-flex flex-column" style="padding: 1.5rem;">
                        <h5 class="card-title fw-bold text-dark">{{ $movie->title }}</h5>
                        <p class="card-text flex-grow-1 text-muted">{{ $movie->description }}</p>
                        <div>
                            <span class="badge rounded-pill px-3 py-2"
                                    style="background-color: #fee2e2; color: #dc3545; border: none;">
                                <i class="fas fa-film me-1"></i>
                                {{ $movie->genre->name }}
                            </span>
                            <p class="text-muted small mt-3 mb-3">
                                <i class="far fa-calendar-alt me-1"></i>
                                Published: {{ date('M d, Y', strtotime($movie->publish_date)) }}
                            </p>
                            <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-outline-danger w-100 rounded-pill"
                                        style="transition: all 0.3s ease;"
                                        onclick="return confirm('Are you sure you want to delete this movie?')">
                                    <i class="fas fa-trash-alt me-2"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $movies->links() }}
    </div>
</div>

@endsection
