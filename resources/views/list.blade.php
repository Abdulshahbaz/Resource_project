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
            border: 1px solid gray;
            margin-top: 42px;
        }
    </style>
</head>

<body>
    
    <h1 class="mt-3" style="text-align: center">User List </h1>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('users.create ') }}" class="btn btn-primary float-end"><span
                        class="cil-contrast "></span> Add New User</a>
            </div>

            <div class="card-body">
                <div class="example">
                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1035">

                            <select class=" form-control-sm float-end mb-2" name="status" id="status">
                                <option selected>Select</option>
                                <option value="pending">Pending</option>
                                <option value="progress">Progress</option>
                                <option value="compeleted">Compeleted</option>
                            </select>
                            <table class="table table-striped border datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Due_Date</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user as $item)
                                        @php
                                            $date = Carbon\Carbon::parse($item->due_date);
                                          
                                            $iscompelted = strtolower($item->status) === 'compeleted';
                                            $ispasdate = !$iscompelted && $date->ispast();
                                        @endphp

                                        <tr @if (!$iscompelted && $date->ispast()) style="background-color:red;" @else
                                             style="background-color:green;" @endif
                                               class="user-row" data-status="{{ $item->status }}">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->due_date }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ url('users/' . $item->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                @if (!$ispasdate)
                                                    <a href="{{ url('users/' . $item->id . '/edit') }}"
                                                        class="btn  btn-sm btn-success" desiable>Edit</a>
                                                @endif

                                                <form action="{{ url('users/' . $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    {{ csrf_field() }}
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this data?')">
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-end">
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('status').addEventListener('change', function() {
            var selectedStatus = this.value;
            var rows = document.querySelectorAll('.user-row');

            rows.forEach(function(row) {
                if (selectedStatus === 'Select' || row.getAttribute('data-status') === selectedStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
