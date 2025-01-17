<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient Matrix</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- icheck bootstrap -->
    <link
      rel="stylesheet"
      href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../../dist/css/adminlte.css" />
    <!-- Custom style -->
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body class="hold-transition">
    <div class="background-image-register">
      <div class="login-box">
        <!-- /.login-logo -->
        <div
          class="card card-outline card-primary text-white"
          style="
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1),
              0px 10px 20px -15px rgba(0, 0, 0, 0.3);
            background: transparent;
            backdrop-filter: blur(30px);
          "
        >
          <div
            class="card-header text-center"
            style="border-bottom: 1px solid #8bb1d6"
          >
            <p class="h1"><b>Patient</b>Matrix</p>
          </div>
          <div class="card-body">
            <p class="login-box-msg pb-2"><b>Register</b></p>

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="input-group mb-3">
                <input id="name" type="text"placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="password-confirm" placeholder="Re-enter Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                   
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">
                    Register
                  </button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <!-- /.social-auth-links -->
            <div class="d-flex justify-content-between mt-3">
              <p class="mb-0">
                <a href="{{route('login')}}" class="text-center"
                  >Already account? Login</a
                >
              </p>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
  </body>
</html>
