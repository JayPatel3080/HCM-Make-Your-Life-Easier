<!-- resources/views/tasks/update-status.blade.php -->

@extends('layouts.main')

@section('content')

<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Task Status</h1>
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
            <!-- Task status update form start -->
            <form id="updateStatusForm" name="updateStatusForm" method="POST" action="{{ route('tasks.update.status', $task->id) }}">
                @csrf
                @method('PUT')
                <div class="info-box d-block">
                    <div class="row">
                        <div class="col-4">
                            <select name="task_status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="Pending" {{ $task->task_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->task_status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->task_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-block bg-gradient-secondary" style="">
                        Update Status
                    </button>
                </div>
            </form>
            <!-- Task status update form end -->
        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
