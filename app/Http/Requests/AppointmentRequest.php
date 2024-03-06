<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
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
        ];
    }
}
