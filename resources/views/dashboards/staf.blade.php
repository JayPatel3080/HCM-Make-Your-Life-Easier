@extends('layouts.main')

@section('content')
<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"
                ><i class="fas fa-cog"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Hospital Traffic</span>
                <span class="info-box-number">
                  80
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"
                ><i class="fas fa-thumbs-up"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Cases</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"
                ><i class="fas fa-shopping-cart"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Pharmacy Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"
                ><i class="fas fa-users"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Patient</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Report</h5>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Cases: 29 Aug, 2022 - 29 Feb, 2024</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas
                        id="salesChart"
                        height="180"
                        style="height: 180px"
                      ></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Wards Details</strong>
                    </p>

                    <div class="progress-group">
                      General
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div
                          class="progress-bar bg-primary"
                          style="width: 80%"
                        ></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      ICU
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div
                          class="progress-bar bg-danger"
                          style="width: 75%"
                        ></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Premium</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div
                          class="progress-bar bg-success"
                          style="width: 60%"
                        ></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      VIPs
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div
                          class="progress-bar bg-warning"
                          style="width: 50%"
                        ></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Doctors And Surgeons</h3>

                        <!-- <div class="card-tools">
                        <span class="badge badge-danger">8 New Members</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div> -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <ul class="users-list clearfix">
                          <li>
                            <img
                              src="dist/img/user1-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#"
                              >Alexander Pierce</a
                            >
                            <span class="users-list-date">Today</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user8-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">Norman</a>
                            <span class="users-list-date">Yesterday</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user7-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">Jane</a>
                            <span class="users-list-date">12 Jan</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user6-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">John</a>
                            <span class="users-list-date">12 Jan</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user2-160x160.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#"
                              >Alexander</a
                            >
                            <span class="users-list-date">13 Jan</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user5-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">Sarah</a>
                            <span class="users-list-date">14 Jan</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user4-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">Nora</a>
                            <span class="users-list-date">15 Jan</span>
                          </li>
                          <li>
                            <img
                              src="dist/img/user3-128x128.jpg"
                              alt="User Image"
                            />
                            <a class="users-list-name" href="#">Nadia</a>
                            <span class="users-list-date">15 Jan</span>
                          </li>
                        </ul>
                        <!-- /.users-list -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer text-center">
                        <a href="javascript:">View All Users</a>
                      </div>
                      <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                  </div>
                  <div class="col-md-6">
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Patient Chart</h3>

                        <div class="card-tools">
                          <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                          >
                            <i class="fas fa-minus"></i>
                          </button>
                          <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="remove"
                          >
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <canvas
                          id="donutChart"
                          style="
                            min-height: 250px;
                            height: 250px;
                            max-height: 250px;
                            max-width: 100%;
                          "
                        ></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                          <img
                            class="img-circle elevation-2"
                            src="../dist/img/user7-128x128.jpg"
                            alt="User Avatar"
                          />
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">
                          Nadia Carmichael
                        </h3>
                        <h5 class="widget-user-desc">MD</h5>
                      </div>
                      <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Operations
                              <span class="float-right badge bg-primary"
                                >31</span
                              >
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Patient
                              <span class="float-right badge bg-info"
                                >35</span
                              >
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Male
                              <span class="float-right badge bg-success"
                                >12</span
                              >
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Female
                              <span class="float-right badge bg-danger"
                                >842</span
                              >
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">
                          Alexander Pierce
                        </h3>
                        <h5 class="widget-user-desc">Founder & CEO</h5>
                      </div>
                      <div class="widget-user-image">
                        <img
                          class="img-circle elevation-2"
                          src="../dist/img/user1-128x128.jpg"
                          alt="User Avatar"
                        />
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">3,200</h5>
                              <span class="description-text">Patient</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">13,000</h5>
                              <span class="description-text">Recover</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                            <div class="description-block">
                              <h5 class="description-header">35</h5>
                              <span class="description-text">Migrated</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div
                        class="widget-user-header text-white"
                        style="
                          background: url('../dist/img/photo1.png') center
                            center;
                        "
                      >
                        <h3 class="widget-user-username text-right">
                          Elizabeth Pierce
                        </h3>
                        <h5 class="widget-user-desc text-right">Doctor</h5>
                      </div>
                      <div class="widget-user-image">
                        <img
                          class="img-circle"
                          src="../dist/img/user3-128x128.jpg"
                          alt="User Avatar"
                        />
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">3,200</h5>
                              <span class="description-text">Patient</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">13,000</h5>
                              <span class="description-text">Recover</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                            <div class="description-block">
                              <h5 class="description-header">35</h5>
                              <span class="description-text">Migrated</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
            </div>
            <!-- ./card-body -->

            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
