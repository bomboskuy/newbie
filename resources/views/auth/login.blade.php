<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png">
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,800;1,400;1,500;1,600;1,800&amp;display=swap"></head>
{{--   
  <style>
    body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            font-family: sans-serif;
            background: url('assets/images/people.png') no-repeat center center fixed; /* Gambar background */
            background-size: cover; /* Menyesuaikan ukuran gambar dengan layar */
            background-position: center;
        }
  </style> --}}

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.svg" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>

                
                @if(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
                @endif

                
                <form action="{{ route('otwlogin')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-lg" id="exampleInputUsername" placeholder="Username" fdprocessedid="kzvmum">
                    @error('username')
                      <small> {{ $message}}</small>                      
                    @enderror
                  </div>


                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" fdprocessedid="y6dsa">
                    @error('password')
                      <small> {{ $message}}</small>                      
                    @enderror
                  </div>

                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    {{-- <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in <i class="input-helper"></i></label>
                    </div> --}}
                    {{-- <a href="/" class="auth-link text-black">Forgot password?</a>
                  </div> --}}
                  <div class="text-center mt-2 font-weight-light"> Don't have an account?
                    <a href="{{route ('register')}}" class="text-primary mt-2 font-weight-light">Create</a> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->

              @if(session('create'))
                <div class="alert alert-success">
                    {{ session('create') }}
                </div>
              @endif
  
<span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span></body></html>