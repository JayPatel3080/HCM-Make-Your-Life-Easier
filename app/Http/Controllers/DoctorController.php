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
    public function edit(User $doctor)
    {
        $doctorSpecialties = DoctorSpecialty::all();
        $doctorDescription = DoctorsDescription::where('user_id', $doctor->id)->firstOrFail();

        return view('doctors.edit', compact('doctor', 'doctorSpecialties', 'doctorDescription'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'exper' => 'required|numeric',
            'doctor_specialty' => 'required|exists:doctor_specialties,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
        ]);

        $doctorDescription = DoctorsDescription::where('user_id', $user->id)->firstOrFail();
        $doctorDescription->update([
            'doctor_specialties_id' => $request->doctor_specialty,
            'experience' => $request->exper
        ]);

        return redirect()->route('doctor.index')->with('success', 'Doctor details updated successfully.');
    }
    public function destroy($id)
    {
        $doctor = User::findOrFail($id);

        $doctor->delete();

        return redirect()->back()->with('success', 'Doctor deleted successfully.');
    }
}
