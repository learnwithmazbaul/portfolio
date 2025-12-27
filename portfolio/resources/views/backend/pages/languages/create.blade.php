@extends('backend.layout.app')
@section('title', 'Resume/Languages Create')

@section('content')

    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Create Language</h1>

            <a href="{{ route('languages.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Add New Language
            </div>

            <div class="card-body">

                <form action="{{ route('languages.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Language Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your language name" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
