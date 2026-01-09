@extends('backend.layout.app')
@section('title', 'Contacts')

@section('content')

    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Edit Contact</h1>

            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>
                Edit Contact
            </div>

            <div class="card-body">

                <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <input type="text" name="fullName" class="form-control @error('fullName') is-invalid @enderror" placeholder="fullname" value="{{ $contact->fullName }}">

                        @error('fullName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="enter your email"
                            value="{{ $contact->email }}">

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="phone" value="{{ $contact->phone }}">

                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Details</label>
                        <textarea name="message" class="form-control" id="details" placeholder="enter your message">{{ $contact->message }}</textarea>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                </form>

            </div>
        </div>
    </div>

@endsection
