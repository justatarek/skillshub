@extends('layouts.dashboard')

@section('title')
    Categories
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('includes.messages')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All categories</h3>
                                <div class="card-tools">
                                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-primary">Add new category</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (en)</th>
                                        <th>Name (ar)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                <a href="{{ route('dashboard.categories.show', $category->id) }}">{{ $loop->iteration }}</a>
                                            </td>
                                            <td>{{ $category->getTranslation('name', 'en') }}</td>
                                            <td>{{ $category->getTranslation('name', 'ar') }}</td>
                                            <td>
                                                @if($category->active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-sm btn-primary edit-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-info edit-btn">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="{{ route('dashboard.categories.destroy', $category->id) }}" class="d-inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <form method="post" action="{{ route('dashboard.categories.toggle', $category->id) }}" class="d-inline-block">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        @if($category->active)
                                                            <i class="fas fa-lock"></i>
                                                        @else
                                                            <i class="fas fa-lock-open"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="d-flex my-3 justify-content-center">
                            {{ $categories->links('includes.paginator.dashboard') }}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
