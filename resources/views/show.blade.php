@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="clo-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>User Data
                            <a href="{{ route('task.index') }}" class="btn btn-danger float-end">Back</a>
                        </h1>
                    </div>
                    @php
                    $date = Carbon\Carbon::parse($userdata->due_date);
                    $iscompelted = strtolower($userdata->status) === 'compeleted';
                  
                @endphp

                    <div class="card-body" @if (!$iscompelted && $date->ispast()) style="background-color:red;"
                     @else style="background-color:green;" @endif>

                        <label class="text-white">Title</label>
                        <h4 style="color: white">{{ $userdata->title }}</h4>
                        <hr>

                        <label class="text-white">Description</label>
                        <h4 style="color: white">{{ $userdata->description }}</h4>
                        <hr>

                        <label class="text-white">Due-Date</label>
                        <h4 style="color: white">{{ $userdata->due_date }}</h4>
                        <hr>

                        <label class="text-white">Status</label>
                        <h4 style="color: white">{{ $userdata->status }}</h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


