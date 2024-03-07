@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appoinment Managment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('appoinment.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Appoinment Managment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                @if (Auth::user()->role == "patient")
                  <a href="{{ route('appoinment.create') }}" class="btn btn-primary">Add Appointment</a>
                @endif

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="width: 100%; overflow-x: scroll; overflow-y: hidden;">

                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Status</th>
                      <th>Patient Name</th>
                      <th>Doctor Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Medical History</th>
                      <th>Address</th>
                      <th>Doctor Specialty</th>
                      <th>Appointment Date</th>
                      <th>Appointment Time Slot</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($appoinment as $appointment)
                      <tr>
                        <td>{{ $appointment['id'] }}</td>
                        @if ($appointment->status == "Pendding" && Auth::user()->role == "staff")
                        <td><span type="button" onclick="openModal('{{ $appointment['patient_first_name'] }} {{ $appointment['patient_last_name'] }}' , '{{ $appointment->doctorSpecialty->name}}' ,'{{ $appointment->doctor_specialty_id}}','{{ $appointment->id}}')" data-toggle="modal" data-target="#modal-secondary" class="badge badge-warning" style="cursor: pointer;"> {{ $appointment['status'] }}</span> </td>
                        @elseif ($appointment->status == "Pendding" )
                        
                        <td><span class="badge badge-warning">{{$appointment->status}}</span></td>  

                        @elseif($appointment->status == "Approved")  
                        <td><span class="badge badge-success">{{$appointment->status}}</span></td>  

                        @elseif($appointment->status = "Reject")
                        <td><span class="badge badge-danger">{{$appointment->status}}</span></td>  

                        @endif
                        @if (Auth::user()->role == "doctor")
                        
                          <td><a href="{{route('appoinment.patient.prescription')}}">{{ $appointment['patient_first_name'] }} {{ $appointment['patient_last_name'] }}</a></td>

                        @else
                            <td>{{ $appointment['patient_first_name'] }} {{ $appointment['patient_last_name'] }}</td>
                        @endif
  
                        <td>{{$appointment->doctor->name ?? ''}}</td>
                        <td>{{ $appointment['patient_email'] }}</td>
                        <td>{{ $appointment['patient_phone_number'] }}</td>
                        <td>{{ $appointment['patient_age'] }}</td>
                        <td>{{ $appointment['patient_gender'] }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($appointment['patient_medical_history'], 50) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($appointment['patient_address'], 20) }}</td>
                        <td>{{ $appointment->doctorSpecialty->name}}</td>
                        <td>{{ $appointment['appointment_date'] }}</td>
                        <td>{{ $appointment['appointment_time_slot'] }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Appointment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <input type="hidden" name="id" id="id">
                  <Label style="margin-bottom: 0px;"> Name</Label> <br/>
                  <strong id="patientName"></strong>
                </div>
                <div class="col-6">
                  <Label style="margin-bottom: 0px;">Specialist</Label> <br/>
                  <strong id="doctorSpecialty"></strong>
                </div> 
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-6"> 
                  <select name="status" class="select2bs4 form-control" data-placeholder="Gender" style="width: 100%; height: 100%">
                    <option value="Pendding">Pendding</option>
                    <option value="Approved">Approved</option>
                    <option value="Reject">Reject</option>
                  </select>
                </div>
                <div class="col-6">   
                  <select name="doctorDropdown" id="doctorDropdown" class="select2bs4 form-control" data-placeholder="Gender" style="width: 100%; height: 100%">
                    <option value="">Select Doctor</option>
                  </select>
                </div>
              </div>          
            </div>
            <div class="modal-footer justify-content-end">
              <button type="button" class="btn btn-outline-light" data-id="{{ $appointment->id ?? null }}">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection  
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(function() {
      $('#modal-secondary').on('click', '.btn-outline-light', function() {
        var status = $('select[name="status"]').val();
        var doctor_id = $('#doctorDropdown').val();
        var id = $(this).data('id'); 

        $.ajax({
          type: "GET",
          url: "/change/appoinment-status", 
          data: {
            status: status,
            id:id,
            doctor_id: doctor_id
          },
          success: function(response) {
            location.reload();
          },
          error: function(xhr, status, error) {
            console.error('Error saving changes:', error);
          }
        });
      });
    });
      function openModal(patientName,doctor,doctor_spe_id,id) {
        var dropdown = document.getElementById('doctorDropdown');

        dropdown.innerHTML = '';

        $.ajax({
        type: "GET",
        url: "/doctor-list",
        data: { id: doctor_spe_id },
        success: function(response) {
            
            $('#patientName').text(patientName);
            $('#doctorSpecialty').text(doctor);
            $('#appointmentId').val(id);
           
            var option = document.createElement('option');
              option.text = 'Select Doctor';
              option.value = '';
              dropdown.add(option);

            response.forEach(function(doctor) {
              var option = document.createElement('option');
              option.text = doctor.name;
              option.value = doctor.user_id;
              dropdown.add(option);
          });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
    
  }
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection