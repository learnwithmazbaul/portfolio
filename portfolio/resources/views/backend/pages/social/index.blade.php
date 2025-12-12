@extends('backend.layout.app')
@section('title', 'Home/Social')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">Home Page</h1>

            <a href="{{ route('socials.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Social
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Social</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                Social DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="2%">Serial</th>
                            <th width="15%">Icon Name</th>
                            <th width="43%">Social Link</th>
                            <th width="23%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($socials as $key=>$social)

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><i class="bi me-2"></i>{{ $social->icon_name }}</td>
                                <td><a href="" target="_blank">{{ $social->social_link }}</a></td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('socials.edit', $social->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('socials.destroy',$social->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
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
