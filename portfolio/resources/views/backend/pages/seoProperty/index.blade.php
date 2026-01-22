@extends('backend.layout.app')
@section('title', 'Seo Property')

@section('content')

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="m-0">SEO Property Page</h1>

            <a href="{{ route('properties.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create SEO Property
            </a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">SEO Property</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-table me-2"></i>
                SEO Property DataTable
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Og Image</th>
                            <th>Page Name</th>
                            <th>Title</th>
                            <th>Keyword</th>
                            <th>Description</th>
                            <th>Og Site Name</th>
                            <th>Og Url</th>
                            <th>Og Title</th>
                            <th>Og Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($seoProperties as $seoProperty)
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="{{ asset($seoProperty->ogImage) }}" width="50" height="50" alt="">
                                </td>
                                <td>{{ $seoProperty->pageName }}</td>
                                <td>{{ $seoProperty->title }}</td>
                                <td>{{ $seoProperty->keywords }}</td>
                                <td>{{ $seoProperty->description }}</td>
                                <td>{{ $seoProperty->ogSiteName }}</td>
                                <td>{{ $seoProperty->ogUrl }}</td>
                                <td>{{ $seoProperty->ogTitle }}</td>
                                <td>{{ $seoProperty->ogDescription }}</td>
                                <td class="text-nowrap" style="width: 180px;">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('properties.edit',$seoProperty->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('properties.destroy',$seoProperty->id) }}" method="post">
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
