@extends('backend.layout.app')
@section('title', 'Edit Project')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Create Project</h1>

            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Add New Project
            </div>

            <div class="card-body">

                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $project->title }}" placeholder="Enter your project title">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Link</label>
                        <input type="text" name="projectLink" value="{{ $project->projectLink }}" class="form-control" placeholder="Enter Title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Details</label>
                        <textarea name="details" class="form-control  @error('details') is-invalid @enderror" id="details"
                            placeholder="enter your experience details">{{ $project->projectLink }}</textarea>

                        @error('details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image Upload</label>
                        <input type="file" name="thumbnailImg" id="photo" class="form-control @error('thumbnailImg') is-invalid @enderror">

                        @error('thumbnailImg')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img id="showImage" src="{{ $project->thumbnailImg ? asset($project->thumbnailImg) : asset('images/placeholder-img.jpg') }}" alt="image" width="100"
                            style="border:1px solid #ccc;padding:5px; border-radius:5px;">
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Save</button>

                </form>

            </div>
        </div>
    </div>

@endsection
