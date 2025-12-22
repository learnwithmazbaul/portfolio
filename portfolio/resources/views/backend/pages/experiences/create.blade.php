@extends('backend.layout.app')
@section('title', 'Resume/Experiences Create')

@section('content')

    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Create Experience</h1>

            <a href="{{ route('experiences.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Add New Experience
            </div>

            <div class="card-body">

                <form action="{{ route('experiences.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Duration</label>
                        <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="duration" value="{{ old('duration') }}">

                        @error('duration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Designation</label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="designation" value="{{ old('designation') }}">

                        @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Details</label>
                        <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details"
                            placeholder="enter your experience details">{{ old('details') }}</textarea>

                        @error('details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save Social
                    </button>
                </form>

            </div>
        </div>
    </div>

@endsection
