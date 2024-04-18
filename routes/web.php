<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Appointments;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/admin', function () {
    return view('dashboards.admin');
});
Route::get('/doctor', function () {
    return view('dashboards.doctor');
});
Route::get('/patient', function () {
    return view('dashboards.patient');
})->name('dashboards.patient');
Route::get('/staf', function () {
    return view('dashboards.staf');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->middleware('role')->name('home');
    Route::resource('user', UserController::class);
    Route::resource('appoinment', AppointmentController::class);
    Route::get('/appoinment/patient/prescription/{id}', [AppointmentController::class, 'showPrescription'])->name('appoinment.patient.prescription');
    Route::get('/doctor-list', [AppointmentController::class, 'getDoctorList'])->name('doctor.list');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctors/{user}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    Route::get('/change/appoinment-status', [AppointmentController::class, 'changeAppointmentStatus'])->name('change.appoinment.status');
    Route::post('/prescription/save', [AppointmentController::class, 'savePresciption'])->name('savePresciption');
    Route::get('/prescription/{id}/export-pdf', [AppointmentController::class, 'exportPrescriptionPDF'])->name('prescription.export.pdf');
    Route::get('/index/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [DoctorController::class, 'creart'])->name('doctor.create');
    Route::post('/doctor/save', [DoctorController::class, 'store'])->name('doctor.save');
    Route::resource('tasks', TaskController::class);
    Route::put('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.update.status');
    Route::get('/tasks/{task}/change-status', [TaskController::class, 'chnageStatus'])->name('tasks.changeStatus');
    Route::get('/appointment/{id}/payment', [AppointmentController::class, 'showPaymentPage'])->name('appointment.payment');
    Route::post('/appointment/complete/payment/{id}', [AppointmentController::class, 'completePayment'])->name('complete.payment');
    Route::get('profile/update', [UserController::class, 'profileUpdate'])->name('profile-update');
    Route::put('update/profile/{id}', [UserController::class, 'updateProfile'])->name('update-profile');
});
