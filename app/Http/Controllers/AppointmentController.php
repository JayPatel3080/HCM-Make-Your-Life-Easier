<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Mail\AppointmentCreatedNotification;
use App\Mail\AppointmentStatusChangeNotification;
use App\Mail\AppointmentStatusUpdated;
use App\Models\Appointments;
use App\Models\DoctorSpecialty;
use App\Models\Prescriptions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

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

        $staffUser = User::where('role', 'staff')->first();
        if ($staffUser) {
            Mail::to($staffUser->email)->send(new AppointmentCreatedNotification($appointment));
        }
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
    public function edit(Appointments $appoinment)
    {
        $doctorSpecialties  = DoctorSpecialty::all();

        return view('appoinments.edit', compact('appoinment', 'doctorSpecialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appoinment)
    {
        $validatedData = $request->validate([
            'patient_first_name' => 'required|string|max:255',
            'patient_last_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_phone_number' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0',
            'patient_gender' => 'required|string|in:Male,Female,Other',
            'patient_medical_history' => 'nullable|string',
            'patient_address' => 'required|string|max:255',
            'doctor_specialty' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time_slot' => 'required|string|max:255',
        ]);

        $appoinment->update([
            'patient_first_name' => $validatedData['patient_first_name'],
            'patient_last_name' => $validatedData['patient_last_name'],
            'patient_email' => $validatedData['patient_email'],
            'patient_phone_number' => $validatedData['patient_phone_number'],
            'patient_age' => $validatedData['patient_age'],
            'patient_gender' => $validatedData['patient_gender'],
            'patient_medical_history' => $validatedData['patient_medical_history'],
            'patient_address' => $validatedData['patient_address'],
            'doctor_specialty_id' => $validatedData['doctor_specialty'],
            'appointment_date' => $validatedData['appointment_date'],
            'appointment_time_slot' => $validatedData['appointment_time_slot'],
        ]);

        return redirect()->route('appoinment.index')->with('success', 'Appointment deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appoinment)
    {
        $appoinment->delete();

        return redirect()->route('appoinment.index')->with('success', 'Appointment deleted successfully.');
    }

    public function getDoctorList(Request $request)
    {

        $doctorList = User::join('doctors_descriptions', 'users.id', '=', 'doctors_descriptions.user_id')
            ->where('doctors_descriptions.doctor_specialties_id', $request->id)
            ->get();
        return $doctorList;
    }

    public function changeAppointmentStatus(Request $request)
    {
        $appoinment = Appointments::where('id', $request->appoinmentId)->first();
        if (!empty($request->appointment_time_slot)) {
            $appoinment->appointment_time_slot = $request->appointment_time_slot;
        }
        $appoinment->doctor_id = $request->doctorDropdown;
        $appoinment->status = $request->status;
        $appoinment->save();
        $doctor = $appoinment->doctor;
        if ($doctor) {
            Mail::to($doctor->email)->send(new AppointmentStatusUpdated($appoinment, $doctor));
        }
        $user = $appoinment->user;
        if ($user) {
            Mail::to($user->email)->send(new AppointmentStatusChangeNotification($appoinment, $user));
        }
        return redirect()->route('appoinment.index')->with('success', 'Appointment Status Change successfully!');
    }

    public function showPrescription(Request $req)
    {
        $patient_id = $req->route()->parameter('id');
        $todayDate = Carbon::now()->format('d-m-Y');
        $list = Prescriptions::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
        $user = Appointments::where('user_id', $patient_id)->first();

        return view('doctors.prescription', compact('patient_id', 'todayDate', 'list', 'user'));
    }

    public function savePresciption(Request $request)
    {
        $prescription = new Prescriptions();
        $prescription->doctor_id = Auth::id();
        $prescription->patient_id = $request->patient_id;
        $prescription->medication_name = $request->medication_name;
        $prescription->PrescriptionDate = Carbon::now();

        $prescription->save();
        return redirect()->back();
    }
    public function exportPrescriptionPDF($id)
    {

        // Example prescription content (replace this with your actual content)
        $todayDate = Carbon::now()->format('d-m-Y');
        $list = Prescriptions::where('patient_id', $id)->orderBy('id', 'desc')->get();
        $user = Appointments::where('user_id', $id)->first();
        // Render the view into a PDF
        $pdf = PDF::loadView('export.export', compact('todayDate', 'list', 'user',));

        // Download the PDF file
        return $pdf->download('prescription.pdf');;
    }
}
