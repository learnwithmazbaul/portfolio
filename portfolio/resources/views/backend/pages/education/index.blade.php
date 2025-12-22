@extends('backend.layout.app')
@section('title', 'Resume/Educations')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Resume Education Page</h1>

            <a href="{{ route('educations.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Education
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Education</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                Education DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Duration</th>
                            <th>Institution Name</th>
                            <th>field</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($educations as $key => $education)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $education->duration }}</td>
                                <td>{{ $education->institutionName }}</td>
                                <td>{{ $education->field }}</td>
                                <td>{{ $education->subject }}</td>
                                <td>{{ $education->details }}</td>
                                <td class="text-nowrap" style="width: 180px;">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('educations.edit', $education->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('educations.destroy', $education->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure to delete data?')" type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
