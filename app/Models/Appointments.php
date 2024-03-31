<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'status',
        'patient_first_name',
        'patient_last_name',
        'patient_email',
        'patient_phone_number',
        'patient_age',
        'patient_gender',
        'patient_medical_history',
        'patient_address',
        'doctor_specialty',
        'appointment_date',
        'appointment_time_slot',
    ];

    public function doctorSpecialty()
    {
        return $this->belongsTo(DoctorSpecialty::class);
    }

    
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
