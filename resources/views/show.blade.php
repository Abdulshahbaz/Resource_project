<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resource Task</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="clo-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>User Data
                            <a href="{{ route('users.index') }}" class="btn btn-danger float-end">Back</a>
                        </h1>
                    </div>
                    <div class="card-body">

                        <label>Title</label>
                        <h4>{{ $userdata->title }}</h4>
                        <hr>

                        <label>Description</label>
                        <h4>{{ $userdata->description }}</h4>
                        <hr>

                        <label>Due-Date</label>
                        <h4>{{ $userdata->due_date }}</h4>
                        <hr>

                        <label>Status</label>
                        <h4>{{ $userdata->status }}</h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
