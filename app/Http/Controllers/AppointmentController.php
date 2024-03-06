<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointments;
use App\Models\DoctorSpecialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->role;

        $appoinment = match ($role) {
            "super_admin" =>  Appointments::all(),
            "staff" =>  Appointments::all(),
            "patient" => Appointments::where('user_id', Auth::id())->get(),
            "doctor" =>  Appointments::where('doctor_id', Auth::id())->get(),
        };

        return view('appoinments.AppoinmentList', compact('appoinment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctorSpecialties  = DoctorSpecialty::all();
        return view('appoinments.Createappoinment', compact('doctorSpecialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        $validated = $request->validated();

        $appointment = new Appointments();

        $appointment->patient_first_name = $validated['patient_first_name'];
        $appointment->patient_last_name = $validated['patient_last_name'];
        $appointment->patient_email = $validated['patient_email'];
        $appointment->patient_phone_number = $validated['patient_phone_number'];
        $appointment->patient_age = $validated['patient_age'];
        $appointment->patient_gender = $validated['patient_gender'];
        $appointment->patient_medical_history = $validated['patient_medical_history'];
        $appointment->patient_address = $validated['patient_address'];
        $appointment->doctor_specialty_id = $validated['doctor_specialty'];
        $appointment->appointment_date = $validated['appointment_date'];
        $appointment->appointment_time_slot = $validated['appointment_time_slot'];
        $appointment->user_id = Auth::id();
        $appointment->save();

        return redirect()->route('appoinment.index')->with('success', 'Appointment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getDoctorList(Request $request)
    {

        $doctorList = User::join('doctors_descriptions', 'users.id', '=', 'doctors_descriptions.user_id')
            ->where('doctors_descriptions.doctor_specialties_id', $request->id)
            ->get();
        return $doctorList;
    }

    public function chnageAppoinmentStatus(Request $request)
    {

        $appoinment = Appointments::where('id', $request->id)->first();
        $appoinment->doctor_id = $request->doctor_id;
        $appoinment->status = $request->status;
        $appoinment->save();
    }

    public function showPrescription()
    {
        return view('doctors.prescription');
    }
}
