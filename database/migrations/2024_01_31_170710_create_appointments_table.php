<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->string('status')->default('Pendding');
            $table->string('patient_first_name');
            $table->string('patient_last_name');
            $table->string('patient_email');
            $table->string('patient_phone_number');
            $table->integer('patient_age');
            $table->string('patient_gender');
            $table->text('patient_medical_history');
            $table->string('patient_address');
            $table->unsignedBigInteger('doctor_specialty_id')->nullable();
            $table->foreign('doctor_specialty_id')->references('id')->on('doctor_specialties')->nullable();
            $table->date('appointment_date');
            $table->string('appointment_time_slot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
