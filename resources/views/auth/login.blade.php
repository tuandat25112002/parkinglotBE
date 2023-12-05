<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parking Lot | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo mb-0">
                  <img src="{{asset('admin/images/logo-horizontal-web.png')}}">
                </div>
                <h4>Xin chào Admin!</h4>
                @if($errors->any())
                    <h6 class="font-weight-light text-danger">{{$errors->all()[0]}}</h6>
                @else 
                    @if(Session::get('error'))
                        <h6 class="font-weight-light text-danger">{{Session::get('error')}}</h6>
                    @else
                        <h6 class="font-weight-light">Đăng nhập để tiếp tục.</h6>
                    @endif 
                @endif
                <form method="POST" action="{{ URL::to('check-login') }}" class="pt-3">
                  @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" value="{{old('email')}}" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Đăng nhập">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Nhớ đăng nhập </label>
                    </div>
                    <a href="#" class="auth-link text-black">Quên mật khẩu ?</a>
                  </div>
                  {{-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                  </div> --}}
                  <div class="text-center mt-4 font-weight-light"> Bạn chưa có tài khoản? <a href="{{route('register')}}" class="text-primary">Hãy tạo tài khoản mới</a>
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
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.cookie.j')}}s" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>