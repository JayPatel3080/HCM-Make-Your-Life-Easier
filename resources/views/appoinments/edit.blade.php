@extends('layouts.main')

@section('content')

<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Appointment</h1>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- Appointment form start -->
        <form id="editAppointmentForm" name="editAppointmentForm" method="POST" action="{{ route('appoinment.update', $appoinment->id) }}">
            @csrf
            @method('PUT')
            <div class="info-box d-block">
                <div class="row">
                    <div class="col-4">
                        <input type="text" name="patient_first_name" class="form-control" placeholder="Patient First Name" value="{{ $appoinment->patient_first_name }}">
                    </div>
        
                    <div class="col-4">
                        <input type="text" name="patient_last_name" class="form-control" placeholder="Patient Last Name" value="{{ $appoinment->patient_last_name }}">
                    </div>
                    <div class="col-4">
                        <input type="text" name="patient_email" class="form-control" placeholder="Patient Email Address" value="{{ $appoinment->patient_email }}">
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-4">
                        <input type="text" name="patient_phone_number" class="form-control" placeholder="Patient Phone Number" value="{{ $appoinment->patient_phone_number }}">
                    </div>
                    <div class="col-4">
                        <input type="number" name="patient_age" class="form-control" placeholder="Patient Age" value="{{ $appoinment->patient_age }}">
                    </div>
                    <div class="col-4">
                        <select name="patient_gender" class="select2bs4 form-control" data-placeholder="Gender" style="width: 100%; height: 100%">
                            <option value="">Select Gender</option>
                            <option value="Male" @if($appoinment->patient_gender === 'Male') selected @endif>Male</option>
                            <option value="Female" @if($appoinment->patient_gender === 'Female') selected @endif>Female</option>
                            <option value="Other" @if($appoinment->patient_gender === 'Other') selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-12">
                        <textarea name="patient_medical_history" class="form-control" id="" placeholder="Patient Medical History" rows="10">{{ $appoinment->patient_medical_history }}</textarea>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-6">
                        <input type="text" name="patient_address" class="form-control" placeholder="Patient Address" value="{{ $appoinment->patient_address }}">
                    </div>
        
                    <div class="col-6">
                        <select name="doctor_specialty" class="form-control" id="doctor_specility">
                            <option value="">Select Specialty</option>
                            @foreach ($doctorSpecialties as $specialty)
                            <option value="{{ $specialty->id }}" @if($specialty->id === $appoinment->doctor_specialty_id) selected @endif>{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="row" style="margin-top: 20px">
                    <div class="col-6">
                        <input type="Date" name="appointment_date" class="form-control" placeholder="Appointment Date" value="{{ $appoinment->appointment_date }}">
                    </div>
        
                    <div class="col-6">
                        <select name="appointment_time_slot" class="select2bs4 form-control" data-placeholder="Gender" style="width: 100%; height: 100%">
                            <option value="">Appointment time slot</option>
                            @php
                                $startTime = strtotime('9:00 AM');
                                $endTime = strtotime('5:00 PM');
                                $interval = 15 * 60; // 15 minutes in seconds

                                for ($time = $startTime; $time < $endTime; $time += $interval) {
                                    $timeSlot = date('g:i A', $time);
                                    echo "<option value=\"$timeSlot\" @if($timeSlot === $appoinment->appointment_time_slot) selected @endif>$timeSlot</option>";
                                }
                            @endphp
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-block bg-gradient-secondary" style="">
                    Update
                </button>
            </div>
        </form>
        
        <!-- Appointment form end -->
      </div>

      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
