<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Allergy & Immunology',
            'Anesthesiology',
            'Cardiology',
            'Dentistry',
            'Dermatology',
            'Emergency Medicine',
            'Endocrinology',
            'Family Medicine',
            'Gastroenterology',
            'Geriatrics',
            'Hematology',
            'Infectious Disease',
            'Internal Medicine',
            'Medical Genetics',
            'Nephrology',
            'Neurology',
            'Obstetrics & Gynecology',
            'Oncology',
            'Ophthalmology',
            'Orthopedics',
            'Otolaryngology',
            'Pathology',
            'Pediatrics',
            'Physical Medicine & Rehabilitation',
            'Plastic Surgery',
            'Podiatry',
            'Psychiatry',
            'Pulmonology',
            'Radiology',
            'Rheumatology',
            'Sports Medicine',
            'Surgery',
            'Urology',
        ];
        

        foreach ($specialties as $specialty) {
            DB::table('doctor_specialties')->insert([
                'name' => $specialty,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
