@extends('backend.layout.app')
@section('title', 'All Project')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Project Page</h1>

            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Project
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Project</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                Project DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>ProjectLink</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projects as $key => $project)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ asset($project->thumbnailImg) }}" alt="" style="width: 100px">
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->projectLink }}</td>
                                <td>{{ $project->details }}</td>
                                <td class="text-nowrap" style="width: 180px;">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('projects.edit',$project->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('projects.destroy',$project->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete data?')" class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash"></i></button>
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
