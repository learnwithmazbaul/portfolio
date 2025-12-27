@extends('backend.layout.app')
@section('title', 'Resume/Skills')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Resume Skill Page</h1>

            <a href="{{ route('skills.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Skill
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Skill</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                Skill DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="7%">Serial</th>
                            <th width="70%">Skill Name</th>
                            <th width="23%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($skills as $key => $skill)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $skill->name }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('skills.edit',$skill->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('skills.destroy',$skill->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete data?')" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
