<?php

namespace Database\Factories;

use App\Models\DoctorsDescription;
use App\Models\DoctorSpecialty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorsDescriptionFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::where('role', 'doctor')->pluck('id')->toArray();
        $specialtyIds = DoctorSpecialty::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'experience' => $this->faker->numberBetween(1, 30), 
            'doctor_specialties_id' => $this->faker->randomElement($specialtyIds),
        ];
    }
}
