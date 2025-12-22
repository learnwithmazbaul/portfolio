@extends('backend.layout.app')
@section('title', 'Resume/Educations-edit')

@section('content')

    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Create Education</h1>

            <a href="{{ route('educations.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Add New Education
            </div>

            <div class="card-body">

                <form action="{{ route('educations.update',$education->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Duration</label>
                        <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror"
                            placeholder="duration" value="{{ $education->duration }}">

                        @error('duration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Institution Name</label>
                        <input type="text" name="institutionName"
                            class="form-control @error('institutionName') is-invalid @enderror"
                            placeholder="institution name" value="{{ $education->institutionName }}">

                        @error('institutionName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Field</label>
                        <input type="text" name="field" class="form-control @error('field') is-invalid @enderror"
                            placeholder="field" value="{{ $education->field }}">

                        @error('field')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                            placeholder="subject" value="{{ $education->subject }}">

                        @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Details</label>
                        <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details"
                            placeholder="enter your experience details">{{ $education->details }}</textarea>

                        @error('details')
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
