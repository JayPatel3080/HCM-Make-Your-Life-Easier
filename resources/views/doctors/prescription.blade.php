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
                      value="Demo Test"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Gender</label>
                    <input
                      type="text"
                      class="form-control"
                      value="Male"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Loction</label>
                    <input
                      type="text"
                      class="form-control"
                      value="Canada"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Patient ID</label>
                    <input
                      type="text"
                      class="form-control"
                      value="CAN-012ABC"
                      readonly
                    />
                  </div>
                </div>
                <div class="row pt-3">
                  <div class="col-3">
                    <label>Date of Birth</label>
                    <input
                      type="text"
                      class="form-control"
                      value="29-02-2024"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Age</label>
                    <input
                      type="text"
                      class="form-control"
                      value="56"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Nationality</label>
                    <input
                      type="text"
                      class="form-control"
                      value="Indian"
                      readonly
                    />
                  </div>

                  <div class="col-3">
                    <label>Contact</label>
                    <input
                      type="text"
                      class="form-control"
                      value="45448565"
                      readonly
                    />
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Patient information end  -->

          <!-- static summry start -->
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Clinical Summary - (22-02-2024)</h3>

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
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Quas aspernatur amet neque facilis assumenda. Hic, esse
                veritatis sit iusto magni, neque accusamus reprehenderit
                odit voluptate maxime natus dicta eligendi modi.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- static summry end -->

          <!-- clinical report starts -->
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Clinical Summary - (22-02-2024)</h3>

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
              <div class="card-body p-0">
                <textarea id="summernote"></textarea>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- clinical report ends -->
        </div>

        <!-- daily report ends -->

        <!-- Info boxes -->

        <!-- Appointment form start -->
        <!-- <div class="info-box d-block">
          <div class="row">
            <div class="col-4">
              <input
                type="text"
                class="form-control"
                placeholder="First Name"
              />
            </div>
            <div class="col-4">
              <input
                type="text"
                class="form-control"
                placeholder="Middle Name"
              />
            </div>
            <div class="col-4">
              <input
                type="text"
                class="form-control"
                placeholder="Last Name"
              />
            </div>
          </div>
          <div class="row" style="margin-top: 20px">
            <div class="col-4">
              <input type="text" class="form-control" placeholder="Phone" />
            </div>
            <div class="col-4">
              <input
                type="date"
                class="form-control"
                placeholder="Date Of Birth"
              />
            </div>
            <div class="col-4">
              <select
                class="select2bs4"
                data-placeholder="Gender"
                style="width: 100%; height: 100%"
              >
                <option>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>
          </div>

          <div class="row" style="margin-top: 20px">
            <div class="col-6">
              <input
                type="text"
                class="form-control"
                placeholder="Address"
              />
            </div>

            <div class="col-6">
              <input type="text" class="form-control" placeholder="Email" />
            </div>
          </div>

          <div class="row" style="margin-top: 20px">
            <div class="col-6">
              <input
                type="Date"
                class="form-control"
                placeholder="Appointment Date"
              />
            </div>

            <div class="col-6">
              <select
                class="select2bs4"
                data-placeholder="Gender"
                style="width: 100%; height: 100%"
              >
                <option>Appointment time slot</option>
                <option>9am to 10am</option>
              </select>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-block bg-gradient-secondary">
          Save
        </button> -->
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