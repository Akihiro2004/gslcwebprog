@extends('layout')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9);">
                <div class="card-body" style="padding: 2rem;">
                    <h2 class="card-title mb-4">Add New Movie</h2>

                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold">Genre</label>
                            <select name="genre_id" class="form-select rounded-pill">
                                <option value="">Select Genre</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <div class="alert alert-danger py-2 mt-2" style="border-radius: 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Photo</label>
                            <input type="file" name="photo" class="form-control rounded-pill">
                            <small class="text-muted ms-2">
                                <i class="fas fa-info-circle me-1"></i>Max size: 5MB
                            </small>
                            @error('photo')
                                <div class="alert alert-danger py-2 mt-2" style="border-radius: 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control rounded-pill"
                                value="{{ old('title') }}" maxlength="30">
                            @error('title')
                                <div class="alert alert-danger py-2 mt-2" style="border-radius: 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control"
                                style="border-radius: 15px;" maxlength="50" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger py-2 mt-2" style="border-radius: 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Publish Date</label>
                            <input type="date" name="publish_date" class="form-control rounded-pill"
                                value="{{ old('publish_date') }}" max="{{ date('Y-m-d') }}">
                            @error('publish_date')
                                <div class="alert alert-danger py-2 mt-2" style="border-radius: 15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-5">
                            <button type="submit" class="btn btn-danger rounded-pill px-4"
                                style="background-color: #dc3545; border: none;">
                                <i class="fas fa-save me-2"></i>Submit
                            </button>
                            <a href="{{ route('movies.home') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
