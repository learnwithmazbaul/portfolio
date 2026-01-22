@extends('backend.layout.app')
@section('title', 'Seo Property')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Edit SEO Property</h1>

            <a href="{{ route('properties.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Edit SEO Property
            </div>

            <div class="card-body">

                <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Page Name</label>
                        <select name="pageName" class="form-select @error('pageName') is-invalid @enderror">
                            <option value="" selected disabled>-- Select Page --</option>
                            <option value="home" {{ $property->pageName == 'home' ? 'selected' : '' }}>Home </option>
                            <option value="resume" {{ $property->pageName == 'resume' ? 'selected' : '' }}>Resume </option>
                            <option value="projects" {{ $property->pageName == 'projects' ? 'selected' : '' }}>Projects</option>
                            <option value="contact" {{ $property->pageName == 'contact' ? 'selected' : '' }}>Contact</option>
                        </select>

                        @error('pageName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $property->title }}" placeholder="Enter SEO Title (max 50 chars)">

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Keywords</label>
                        <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror"
                            value="{{ $property->keywords }}" placeholder="keyword1, keyword2, keyword3">

                        @error('keywords')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter meta description">{{ $property->description }}</textarea>

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mb-3">Open Graph (OG) Information</h5>

                    <div class="mb-3">
                        <label class="form-label fw-bold">OG Site Name</label>
                        <input type="text" name="ogSiteName" class="form-control @error('ogSiteName') is-invalid @enderror" value="{{ $property->ogSiteName }}" placeholder="Your site name">

                        @error('ogSiteName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">OG URL</label>
                        <input type="text" name="ogUrl" class="form-control @error('ogUrl') is-invalid @enderror"
                            value="{{ $property->ogUrl }}" placeholder="Full page URL">

                        @error('ogUrl')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">OG Title</label>
                        <input type="text" name="ogTitle" class="form-control @error('ogTitle') is-invalid @enderror"
                            value="{{ $property->ogTitle }}" placeholder="Social media preview title">

                        @error('ogTitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">OG Description</label>
                        <input type="text" name="ogDescription"
                            class="form-control @error('ogDescription') is-invalid @enderror"
                            value="{{ $property->ogDescription }}" placeholder="Short OG description">

                        @error('ogDescription')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">OG Image</label>
                        <input type="file" name="ogImage" class="form-control  @error('ogImage') is-invalid @enderror" id="photo">

                        @error('ogImage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img id="showImage" src="{{ $property->ogImage ? asset($property->ogImage) : asset('backend/images/placeholder-img.jpg') }}" alt="image"
                            width="100" style="border:1px solid #ccc;padding:5px; border-radius:5px;">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save SEO Property
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection
