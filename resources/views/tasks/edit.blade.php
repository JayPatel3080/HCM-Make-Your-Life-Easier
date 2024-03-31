@extends('layouts.main')

@section('content')

<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Task</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Task edit form start -->
            <form id="editTaskForm" name="editTaskForm" method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')
                <div class="info-box d-block">
                    <div class="row">
                        <div class="col-4">
                            <select name="staf_id" class="form-control">
                                <option value="">Select Staff</option>
                                @foreach ($stafList as $staff)
                                    <option value="{{ $staff->id }}" {{ $task->staf_id == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <select name="patient_id" class="form-control">
                                <option value="">Select Patient</option>
                                @foreach ($patientList as $patient)
                                    <option value="{{ $patient->id }}" {{ $task->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="task_status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="Pending" {{ $task->task_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->task_status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->task_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-8">
                            <textarea name="task_description" class="form-control" placeholder="Task Description" rows ="10">{{ $task->task_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-block bg-gradient-secondary" style="">
                        Update Task
                    </button>
                </div>
            </form>

            <!-- Task edit form end -->
        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
