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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                  <h4>Đăng ký</h4>
                  <h6 class="font-weight-light">Đăng ký dễ dàng với chỉ vài bước</h6>
                  <form id="register" action="{{route('create-user')}}" method="POST" class="pt-3">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Họ và tên">
                      <p id="name-errors" class="text-danger mb-0 mt-1 "></p>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                      <p id="email-errors" class="text-danger mb-0 mt-1 "></p>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="Số điện thoại">
                        <p id="phone-errors" class="text-danger mb-0 mt-1 "></p>
                      </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="role" id="role">
                          <option selected disabled hidden>Bạn muốn đăng ký? </option>
                          <option value="0">Admin</option>
                          <option value="1">Quản lý bãi giữ xe</option>
                        </select>
                        <p id="role-errors" class="text-danger mb-0 mt-1 "></p>
                      </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mật khẩu">
                      <p id="password-errors" class="text-danger mb-0 mt-1 "></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="confirm-password" name="confirm_password" placeholder="Xác nhận mật khẩu">
                        <p id="confirm-password-errors" class="text-danger mb-0 mt-1 "></p>
                      </div>
                    {{-- <div class="mb-4">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input"> Tôi đồng ý với <a href="">các điều khoản</a></label>
                      </div>
                    </div> --}}
                    <div class="mt-3">
                      <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Đăng ký">
                    </div>
                    <div class="text-center mt-4 font-weight-light" id="test"> Bạn đã có tài khoản? <a href="{{route('login')}}" class="text-primary">Hãy đăng nhập</a>
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

    <script>
        // this is the id of the form
            $("#register").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');    
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    Swal.fire({
                        title: "Đăng ký thành công",
                        text: data.message,
                        icon: "success"
                        }).then((result) => {
                            window.location.replace("login");    
                        }).catch((err) => {
                            window.location.replace("login");
                        });;
                },
                error: function(data)
                {
                    console.log(data.responseJSON.errors);
                    if (data.responseJSON.errors.email) {
                        $('#email-errors').html(data.responseJSON.errors.email);
                        $('#email').addClass('border-danger');
                    } else {
                        $('#email-errors').html('');
                        $('#email').removeClass('border-danger');
                    }
                    if (data.responseJSON.errors.name) {
                        $('#name-errors').html(data.responseJSON.errors.name);
                        $('#name').addClass('border-danger');
                    }
                    else {
                        $('#name-errors').html('');
                        $('#name').removeClass('border-danger');
                    }
                    if (data.responseJSON.errors.phone) {
                        $('#phone-errors').html(data.responseJSON.errors.phone);
                        $('#phone').addClass('border-danger');
                    } else {
                        $('#phone-errors').html('');
                        $('#phone').removeClass('border-danger');
                    }
                    if (data.responseJSON.errors.role) {
                        $('#role-errors').html(data.responseJSON.errors.role);
                        $('#role').addClass('border-danger');
                    }
                    else {
                        $('#role-errors').html('');
                        $('#role').removeClass('border-danger');
                    }
                    if (data.responseJSON.errors.password) {
                        $('#password-errors').html(data.responseJSON.errors.password);
                        $('#password').addClass('border-danger');
                    }
                    else {
                        $('#password-errors').html('');
                        $('#password').removeClass('border-danger');
                    }
                    if (data.responseJSON.errors.confirm_password) {
                        $('#confirm-password-errors').html(data.responseJSON.errors.confirm_password);
                        $('#confirm-password').addClass('border-danger');
                    } 
                    else {
                        $('#confirm-password-errors').html('');
                        $('#confirm-password').removeClass('border-danger');
                    }
                },
            });

            })
    </script>
    
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