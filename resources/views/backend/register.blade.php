<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" sizes="230x230" href="img/icon-p.png">
  <title>Tạo tài khoản</title>
  <base href="{{ asset('') . 'backend/' }}">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
              </div>
              @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }} </strong>
                </div>
              @endif
               <form action="{{route('saveRegister')}}" method="post" class="user" enctype="multipart/form-data">
                  @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}" placeholder="Họ tên bạn">
                    {!! showError($errors,'name') !!}
                </div>
                  <div class="col-sm-6">
                  <input type="file" class="form-control form-control-user" name="avatar" placeholder="Last Name">
                    {!! showError($errors,'avatar') !!}
                  </div>
                </div>
                <div class="form-group">
                <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="Email Address">
                  {!! showError($errors,'email') !!}
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    {!! showError($errors,'password') !!}
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password">
                    {!! showError($errors,'password_confirmation') !!}
                  </div>
                  <input type="hidden" name="status" value="0" id="">
                  <input type="hidden" name="role" value="2" id="">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Tạo tài khoản</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href=" {{route('login')}} ">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
