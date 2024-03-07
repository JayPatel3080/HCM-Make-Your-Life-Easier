<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\DoctorsDescription;
use App\Models\DoctorSpecialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctorList = User::where('users.role', 'doctor')
            ->get();
        return view('doctors.list', compact('doctorList'));
    }

    public function creart()
    {
        $doctorSpecialties  = DoctorSpecialty::all();
        return view('doctors.create', compact('doctorSpecialties'));
    }

    public function store(DoctorRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'doctor'
        ]);

        DoctorsDescription::create([
            'doctor_specialties_id' => $request->doctor_specialty,
            'user_id' => $user->id,
            'experience' => $request->exper
        ]);

        return redirect()->route('doctor.index');
    }
}
