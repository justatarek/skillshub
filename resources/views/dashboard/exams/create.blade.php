@extends('layouts.dashboard')

@section('title')
    Add new exam (step 1) - Exams
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add new exam (step 1)</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.exams.index') }}">Exams</a></li>
                            <li class="breadcrumb-item active">Create (step 1)</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- form start -->
                            <form method="post" action="{{ route('dashboard.exams.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="NameEn">Name (en)</label>
                                                <input id="NameEn" class="form-control @error('name_en') is-invalid @enderror" name="name_en" type="text" placeholder="Name (en)" value="{{ old('name_en') }}">
                                                @error('name_en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="NameAr">Name (ar)</label>
                                                <input id="NameAr" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" type="text" placeholder="Name (ar)" value="{{ old('name_ar') }}">
                                                @error('name_ar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="DescriptionEn">Description (en)</label>
                                                <textarea id="DescriptionEn" class="form-control @error('description_en') is-invalid @enderror" name="description_en" placeholder="Description (en)" cols="30" rows="10">{{ old('description_en') }}</textarea>
                                                @error('description_en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="DescriptionAr">Description (ar)</label>
                                                <textarea id="DescriptionAr" class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" placeholder="Description (ar)" cols="30" rows="10">{{ old('description_ar') }}</textarea>
                                                @error('description_ar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="Image">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input id="Image" class="custom-file-input @error('image') is-invalid @enderror" name="image" type="file">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('image')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="Category">Skill</label>
                                                <select class="form-control @error('skill') is-invalid @enderror" name="skill">
                                                    @foreach($skills as $skill)
                                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('skill')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="Questions">Questions (number)</label>
                                                <input id="Questions" class="form-control @error('questions_number') is-invalid @enderror" name="questions_number" type="number" placeholder="Questions (number)" value="{{ old('questions_number') }}" min="1">
                                                @error('questions_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="Difficulty">Difficulty</label>
                                                <input id="Difficulty" class="form-control @error('difficulty') is-invalid @enderror" name="difficulty" type="number" placeholder="Difficulty" value="{{ old('difficulty') }}" min="1" max="5">
                                                @error('difficulty')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="Duration">Duration (minutes)</label>
                                                <input id="Duration" class="form-control @error('duration') is-invalid @enderror" name="duration" type="number" placeholder="Duration (minutes)" value="{{ old('duration') }}" min="1">
                                                @error('duration')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Next</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
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
