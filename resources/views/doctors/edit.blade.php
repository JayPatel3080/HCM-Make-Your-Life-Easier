@extends('layouts.main')

@section('content')

<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Doctor</h1>
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
        <!-- Doctor form start -->
        <form method="POST" action="{{ route('doctor.update', $doctor->id) }}">
            <div class="info-box d-block">
              @csrf
              @method('PUT')
                <div class="row">

                    <div class="col-6">
                      <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ $doctor->name }}" required autocomplete="name" autofocus>
                    </div>
        
                    <div class="col-6">
                          <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ $doctor->email }}" required autocomplete="email">
                    </div>
                   
                </div>
                
                <div class="row" style="margin-top: 20px">
                  <div class="col-6">
                    <input type="number" name="exper" class="form-control" placeholder="Doctor Experriencs" value="{{ $doctorDescription->experience }}">
                </div>
        
                    <div class="col-6">
                        <select name="doctor_specialty" class="form-control" id="doctor_specility">
                            <option value="">Select Specialty</option>
                            @foreach ($doctorSpecialties as $specialty)
                            <option value="{{ $specialty->id }}" {{ $doctorDescription->doctor_specialties_id == $specialty->id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="row" style="margin-top: 20px">
                    <div class="col-6">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                    </div>
        
                    
                </div>
            <div class=" mt-2">
                <button type="submit" class="btn btn-block bg-gradient-secondary">
                    Save
                </button>
            </div>
          </div>

        </form>
        
        <!-- Appointment form end -->
      </div>

      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
