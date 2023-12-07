@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('admin.layouts.link-bar',['name'=>'Quản lý người dùng','link'=>'list-user','sub_link'=>'Thêm người dùng'])
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm người dùng</h4>
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
                                  <option selected disabled hidden>Quyền truy cập </option>
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
                              <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Tạo người dùng">
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
  
                  }).catch((err) => {

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
<!-- content-wrapper ends -->
@endsection