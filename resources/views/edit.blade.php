<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resource</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            width: 50%;
            height: auto;
            margin-top: 42px;
        }
    </style>
</head>

<body>
    {{-- {{$userdata}} --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="clo-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Update User Details
                            <a href="{{ route('users.index') }}" class="btn btn-danger float-end">Back</a>
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $userdata->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputTitle" class="form-label mt-1">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $userdata->title }}"
                                    id="exampleInputTitle">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Desciption</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $userdata->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputDate" class="form-label mt-1">Date</label>
                                <input type="date" class="form-control" name="due_date"
                                    value="{{ $userdata->due_date }}" id="exampleInputDate">
                                @error('due_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="exampleInputDate" class="form-label mt-1">Status</label>
                            <select class="form-select form-select-sm mb-2" name="status"
                                aria-label=".form-select-sm example">
                                <option value="{{ $userdata->status }}">{{ $userdata->status }}</option>
                                <option value="pending">Pending</option>
                                <option value="progress">Progress</option>
                                <option value="compeleted">Compeleted</option>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </select>

                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
