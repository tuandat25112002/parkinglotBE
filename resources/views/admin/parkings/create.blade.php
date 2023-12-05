<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    function chooseFile(thumbnail){
        if(thumbnail.files && thumbnail.files[0]){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(thumbnail.files[0]);
        }

    }
    </script>
</head>
@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Quản lý bãi đổ xe</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm bãi đổ xe</h4>
                        <form id="register" action="{{route('create-user')}}" method="POST" class="pt-3">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Tên bãi đổ xe">
                                        <p id="name-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="address" name="address" placeholder="Địa chỉ">
                                        <p id="address-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div class="row">
                                          <div class="form-group col-md-6">
                                              <input type="number" class="form-control form-control-lg" id="lat" name="lat" placeholder="Vĩ độ">
                                              <p id="lat-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <input type="number" class="form-control form-control-lg" id="long" name="long" placeholder="Kinh độ">
                                              <p id="long-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <input type="number" class="form-control form-control-lg" id="max" name="max" placeholder="Số lượng chỗ để xe">
                                          <p id="max-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>          
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex flex-column gap-2">
                                        <img src="{{asset("admin/images/default-thumbnail.jpg")}}" width="100%" height="230px" id="image">
                                        <label for="thumbnail" class="btn btn-gradient-primary">Thêm ảnh</label>
                                        <input type="file" onchange="chooseFile(this)" class="form-control form-control-lg d-none" id="thumbnail" name="image">
                                        <p id="image-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                </div>
                            </div>
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