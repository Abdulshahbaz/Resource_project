@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="clo-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Add New User
                            <a href="{{ route('task.index') }}" class="btn btn-danger float-end">Back</a>
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="exampleInputTitle" class="form-label mt-1">Title</label>
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    id="exampleInputTitle">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Desciption</label>
                                <textarea class="form-control" value="{{ old('description') }}" name="description" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputDate" class="form-label mt-1">Date</label>
                                <input type="date" class="form-control" value="{{ old('due_date') }}" name="due_date"
                                    id="exampleInputDate">
                                @error('due_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="exampleInputDate" class="form-label mt-1">Status</label>
                            <select class="form-select form-select-sm mb-2" name="status"
                                aria-label=".form-select-sm example">
                                <option selected>Select</option>
                                <option value="pending">Pending</option>
                                <option value="progress">Progress</option>
                                <option value="compeleted">Compeleted</option>
                            </select>
                              @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                              @enderror

                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
