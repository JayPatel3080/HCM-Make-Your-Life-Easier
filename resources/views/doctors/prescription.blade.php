@extends('layouts.main')

@section('content')
<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daily Report</h1>
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
        <!-- daily report starts -->
        <div class="row">
          <!-- Patient information start  -->
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Patient Demographics</h3>

                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->patient_first_name .' ' . $user->patient_last_name}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Gender</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->patient_gender}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Appoinment Date</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->appointment_date}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Patient ID</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{'CAN-'.$user->id}}"
                      readonly
                    />
                  </div>
                </div>
                <div class="row pt-3">
                  <div class="col-3">
                    <label>Email</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->patient_email}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Age</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->patient_age}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Status</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->status}}"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Contact</label>
                    <input
                      type="text"
                      class="form-control"
                      value="{{$user->patient_phone_number}}"
                      readonly
                    />
                  </div>
                </div>
                <div class="row pt-3">
                  <div class="col-12 text-right">
                    <form action="{{ route('prescription.export.pdf', ['id' => $patient_id]) }}" method="GET">

                        <button class="btn btn-outline-info">Expoort PDF</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Patient information end  -->
          @if (Auth::user()->role == "doctor" )
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Clinical Summary - {{ $todayDate }}</h3>

                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <form action="{{route('savePresciption')}}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" id="patient_id" value="{{$patient_id}}">

                <div class="card-body p-0">
                  <textarea name="medication_name" id="summernote"></textarea>
                </div>
                <div class="ml-2 mb-2">
                  <button class="btn btn-primary" type="submit">Save</button>

                </div>
                </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          @endif
          
          <!-- static summry start -->
          @foreach ($list as $item)
            <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Clinical Summary - {{$item->PrescriptionDate}}</h3>

                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                {!!$item->medication_name!!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          @endforeach
          
          
          <!-- static summry end -->

          <!-- clinical report starts -->
          

          <!-- clinical report ends -->
        </div>

        <!-- daily report ends -->

        <!-- Info boxes -->

       
        <!-- Appointment form end -->
      </div>

      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')

<script>
    
    $(function () {
      // Summernote
      $("#summernote").summernote();

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai",
      });
    });
  </script>
@endsection