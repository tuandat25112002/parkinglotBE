@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      @include('admin.layouts.link-bar',['name'=>'Quản lý người dùng','link'=>'list-user'])
      <div class="card">
        <div class="card-header w-100 d-flex">
          <h6 class=" mt-2">Danh sách người dùng</h6>
          <a class="ml-auto plus-btn btn-gradient-primary" href="{{route('new-user')}}"> + </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-radius">
            <thead>
            <tr class="btn-gradient-primary text-light fw-bold">
              <th colspan="2">Người dùng</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Quyền truy cập</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $value)
                    <tr>
                    <td class="ml-3 border-r-0 ">
                        @if(isset($value->avatar))
                            <img src="{{asset($value->avatar)}}" alt="image">
                        @else 
                            <img src="{{asset('admin/images/avatar-default.png')}}" alt="image">
                        @endif
                    </td>
                    <td> {{$value->name}}</td>
                    <td>
                        {{$value->email}}
                    </td>
                    <td>{{$value->phone}}</td>
                    <td>
                        <select class="form-control form-control-lg select-role" data-id="{{$value->id}}" data-name="{{$value->name}}" name="role" id="role">
                            <option value="0" <?php echo $value->role == 0 ? "selected" : "" ?>>Admin</option>
                            <option value="1" <?php echo $value->role == 1 ? "selected" : "" ?>>Quản lý bãi giữ xe</option>
                            <option value="2" <?php echo $value->role == 2 ? "selected" : "" ?>>Người dùng</option>
                          </select>
                    </td>
                    <td> <label class="switch">
                        <input type="checkbox" class="checkbox-active" data-id="{{$value->id}}" <?php echo $value->active==1 ? "checked" : ""?>>
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td>  
                        <form  action="{{route('users.destroy',[$value->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick ="return confirm('Bạn muốn xóa người dùng này ?');" type="submit " class="btn btn-gradient-primary p-1"><i class="mdi mdi-delete-forever"></i></button>
                        <a data-id="{{$value->id}}" class="btn btn-view btn-outline-dark p-1"><i class="mdi mdi-eye"></i></a>
                      </form></td>
                    </tr>
                @endforeach    
            </tbody>
            <tfoot>
                <thead>
                    <tr>
                      <th colspan="2">Người dùng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Quyền truy cập</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                    </thead>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin người dùng</h5>
                        <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                              <div class="col col-lg-9 mb-4 mb-lg-0">
                                <div class="card mb-3" style="border-radius: .5rem;">
                                  <div class="row g-0">
                                    <div class="col-md-4 btn-gradient-primary text-center text-white"
                                      style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img id="avatar-user" src="{{asset('admin/images/avatar-default.png')}}" class="mt-5 mb-3 img-fluid " alt="image">
                                      <h5 id="name-user"></h5>
                                      <p id="role-user"></p>
                                      <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body p-4">
                                        <h6>Chung</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                          <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted" id="email-user">info@example.com</p>
                                          </div>
                                          <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted" id="phone-user">123 456 789</p>
                                          </div>
                                        </div>
                                        <h6>Hoạt động</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                          <div class="col-6 mb-3">
                                            <h6>Đăng nhập gần nhất</h6>
                                            <p class="text-muted" id="updated-user"></p>
                                          </div>
                                          <div class="col-6 mb-3">
                                            <h6>Ngày tạo người dùng</h6>
                                            <p class="text-muted" id="created-user">Dolor sit amet</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    <script> 
    
        $('.btn-view').click(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var id = $(this).attr("data-id");
            $.ajax({
                type: "GET",
                url: "{{route('get-user')}}",
                data: {id:id}, 
                success: function(data)
                {
                    $('#name-user').html(data.data.name);
                    if (data.data.role == 0) {
                        $('#role-user').html("Admin");
                    }
                    else if(data.data.role == 1) {
                        $('#role-user').html("Quản lý bãi dữ xe");
                    }
                    else {
                        $('#role-user').html("Người dùng");
                    }
                    $('#email-user').html(data.data.email);
                    $('#phone-user').html(data.data.phone);
                    var date = new Date(data.data.created_at); 
                    $('#created-user').html(date.toLocaleString("en-GB"));
                    var date = new Date(data.data.updated_at); 
                    $('#updated-user').html(date.toLocaleString("en-GB"));
                    if(data.data.avatar != null) {
                        $('#avatar-user').prop("src", data.data.avatar);
                    } else {
                      $('#avatar-user').prop("src", "https://res.cloudinary.com/dcugpagjy/image/upload/v1718611748/avatar/avatar-default_aq0mwv.png");
                    }
                },
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(".btn-view").click(function(){
                $("#myModal").modal('show');
            });
            $(".close-modal").click(function(){
                $("#myModal").modal('hide');
            });
        });
    </script>
     <script type="text/javascript">
        $('.checkbox-active').click(function(){
          var id= $(this).data('id');
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{route('user-active')}}",
            method:"POST",
            data: {id:id,_token:_token},
            success:function(data){
                        Swal.fire({
                        title: "Thay đổi trạng thái thành công",
                        text: data.message,
                        icon: "success"
                        })
                    }
          });
        });
      </script>
        <script type="text/javascript">
            $('.select-role').change(function(event) {
                const role = $(this).val();
                const id = $(this).data('id');
                var _token = $('input[name="_token"]').val();
                const name= $(this).data('name');
                $.ajax({
                    url:"{{route('user-role')}}",
                    method:"POST",
                    data:{role:role,id:id, _token:_token},
                    success:function(data){
                        Swal.fire({
                        title: "Thay đổi quyền truy cập thành công",
                        text: data.message,
                        icon: "success"
                        })
                    }
                });

            });
        </script>
@endsection