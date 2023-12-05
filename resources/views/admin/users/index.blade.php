@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Danh sách người dùng </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý người dùng</li>
          </ol>
        </nav>
      </div>
      {{-- <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic Table</h4>
              <p class="card-description"> Add class <code>.table</code>
              </p>
              <table class="table">
                <thead>
                  <tr>
                    <th>Profile</th>
                    <th>VatNo.</th>
                    <th>Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td><label class="badge badge-danger">Pending</label></td>
                  </tr>
                  <tr>
                    <td>Messsy</td>
                    <td>53275532</td>
                    <td>15 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                  <tr>
                    <td>John</td>
                    <td>53275533</td>
                    <td>14 May 2017</td>
                    <td><label class="badge badge-info">Fixed</label></td>
                  </tr>
                  <tr>
                    <td>Peter</td>
                    <td>53275534</td>
                    <td>16 May 2017</td>
                    <td><label class="badge badge-success">Completed</label></td>
                  </tr>
                  <tr>
                    <td>Dave</td>
                    <td>53275535</td>
                    <td>20 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Hoverable Table</h4>
              <p class="card-description"> Add class <code>.table-hover</code>
              </p>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Sale</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jacob</td>
                    <td>Photoshop</td>
                    <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                    <td><label class="badge badge-danger">Pending</label></td>
                  </tr>
                  <tr>
                    <td>Messsy</td>
                    <td>Flash</td>
                    <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                  <tr>
                    <td>John</td>
                    <td>Premier</td>
                    <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                    <td><label class="badge badge-info">Fixed</label></td>
                  </tr>
                  <tr>
                    <td>Peter</td>
                    <td>After effects</td>
                    <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                    <td><label class="badge badge-success">Completed</label></td>
                  </tr>
                  <tr>
                    <td>Dave</td>
                    <td>53275535</td>
                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Striped Table</h4>
              <p class="card-description"> Add class <code>.table-striped</code>
              </p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> User </th>
                    <th> First name </th>
                    <th> Progress </th>
                    <th> Amount </th>
                    <th> Deadline </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                    </td>
                    <td> Herman Beck </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 77.99 </td>
                    <td> May 15, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                    </td>
                    <td> Messsy Adam </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $245.30 </td>
                    <td> July 1, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                    </td>
                    <td> John Richards </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $138.00 </td>
                    <td> Apr 12, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                    </td>
                    <td> Peter Meggik </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 77.99 </td>
                    <td> May 15, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                    </td>
                    <td> Edward </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 160.25 </td>
                    <td> May 03, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                    </td>
                    <td> John Doe </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 123.21 </td>
                    <td> April 05, 2015 </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                    </td>
                    <td> Henry Tom </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 150.00 </td>
                    <td> June 16, 2015 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
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