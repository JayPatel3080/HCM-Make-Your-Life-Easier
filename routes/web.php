<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
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
    return view('welcome');
});
Route::get('/admin', function () {
    return view('dashboards.admin');
});
Route::get('/doctor', function () {
    return view('dashboards.doctor');
});
Route::get('/patient', function () {
    return view('dashboards.patient');
});
Route::get('/staf', function () {
    return view('dashboards.staf');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role');
Route::resource('user', UserController::class);
Route::resource('appoinment', AppointmentController::class);
Route::get('/appoinment/patient/prescription', [AppointmentController::class, 'showPrescription'])->name('appoinment.patient.prescription');

Route::get('/doctor-list', [AppointmentController::class, 'getDoctorList'])->name('doctor.list');
Route::get('/change/appoinment-status', [AppointmentController::class, 'chnageAppoinmentStatus'])->name('change.appoinment.status');


Route::get('/index/doctor', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'creart'])->name('doctor.create');

Route::post('/doctor/save', [DoctorController::class, 'store'])->name('doctor.save');
