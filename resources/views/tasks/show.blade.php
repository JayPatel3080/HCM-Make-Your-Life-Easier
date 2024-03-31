<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.main') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Task Details
                    </div>
                    <div class="card-body">
                        <p class="card-text">Description: {{ $task->task_description }}</p>
                        <p class="card-text">Status: {{ $task->task_status   }}</p>
                        <!-- You can include more task details here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
