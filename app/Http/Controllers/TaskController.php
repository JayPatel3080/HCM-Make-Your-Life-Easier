<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;
use App\Notifications\TaskStatusChangedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->role;

        $tasks = match ($role) {
            "super_admin" => Task::all(),
            "staff" => Task::where('staf_id', Auth::id())->get(),
            "doctor" => Task::where('doctor_id', Auth::id())->get(),
        };

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stafList = User::where('role', 'staff')->get();
        $patientList = User::where('role', 'patient')->get();


        return view('tasks.create', compact('stafList', 'patientList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request->add(['doctor_id' => auth::id()]);

        $request->validate([
            'staf_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);

        $task = Task::create([
            'doctor_id' => auth::id(),
            'patient_id' => $request->patient_id,
            'staf_id' => $request->staf_id,
            'task_description' => $request->task_description,
            'task_status' => $request->task_status
        ]);
        $user = User::find($request->staf_id);

        // Send notification to the user
        $user->notify(new TaskAssignedNotification($task));
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $stafList = User::where('role', 'staff')->get();
        $patientList = User::where('role', 'patient')->get();
        return view('tasks.edit', compact('task', 'stafList', 'patientList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'staf_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }

    public function chnageStatus(Task $task)
    {
        $stafList = User::where('role', 'staff')->get();
        $patientList = User::where('role', 'patient')->get();
        return view('tasks.chnage-status', compact('task', 'stafList', 'patientList'));
    }
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'task_status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update([
            'task_status' => $request->input('task_status'),
        ]);
        $user = User::find($task->doctor_id);

        // Send notification to the user
        $user->notify(new TaskStatusChangedNotification($task));

        return redirect()->route('tasks.index')->with('status', 'Task status updated successfully.');
    }
}
