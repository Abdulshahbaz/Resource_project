
@extends('layout.app')
@section('content')

    <div class="containerss">
        <div class="card">
            <div class="card-header">
                <h5>Task List</h5>
                <a href="{{ route('task.create') }}" class="btn btn-primary float-end"><span
                        class="cil-contrast "></span> Add New Task</a>
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
                                                                                  
                                    @foreach ($user as $key=>$item)
                                        @php
                                            $date = Carbon\Carbon::parse($item->due_date);
                                          
                                            $iscompelted = strtolower($item->status) === 'compeleted';
                                            $ispasdate = !$iscompelted && $date->ispast();
                                        @endphp

                                        <tr @if (!$iscompelted && $date->ispast()) style="background-color:red;" @else
                                             style="background-color:green;" @endif
                                               class="user-row" data-status="{{ $item->status }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->due_date }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('task.show', $item->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                @if (!$ispasdate)
                                                    <a href="{{ route('task.edit', $item->id, '/edit') }}"
                                                        class="btn  btn-sm btn-success" desiable>Edit</a>
                                                @endif

                                                <form action="{{ route('task.destroy', $item->id) }}" method="POST"
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
    <style>
        .containerss {
            width: 78%;
            height: auto;
            margin-top: 42px;
            margin-left: 20%;
        }
    </style>
 @endsection
