@extends('backend.layout.app')
@section('title', 'Resume/Experiences')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Resume Experience</h1>

            <a href="{{ route('experiences.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Experience
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Experience</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                Experience DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Duration</th>
                            <th>Title</th>
                            <th>Designation</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($experiences as $key => $experience)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $experience->duration }}</td>
                                <td>{{ $experience->title }}</td>
                                <td>{{ $experience->designation }}</td>
                                <td>{{ $experience->details }}</td>
                                <td class="text-nowrap" style="width: 180px;">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('experiences.edit',$experience->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('experiences.destroy',$experience->id) }}" method="post">
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
