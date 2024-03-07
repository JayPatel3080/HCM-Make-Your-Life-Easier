<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorsDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'experience',
        'doctor_specialties_id'
    ];
    public function doctorSpecility()
    {
        return $this->belongsTo(DoctorSpecialty::class, 'doctor_specialties_id', 'id');
    }
}
