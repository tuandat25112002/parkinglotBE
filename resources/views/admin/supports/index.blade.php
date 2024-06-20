@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      @include('admin.layouts.link-bar',['name'=>'Quản lý SOS','link'=>'list-support'])
      <div class="card">
        <div class="card-header w-100 d-flex">
          <h6 class=" mt-2">Danh sách hỗ trợ SOS</h6>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if (session('status'))
                        <div class="alert container-fluid alert-success" role="alert">
                                {{session('status')}} <i id="close" class="mdi mdi-close-circle float-right mt-1"></i>
                            </div>
                        @endif
                        @if (session('erorr'))
                        <div class="alert container-fluid alert-danger" role="alert">
                                {{session('erorr')}} <i id="close" class="mdi mdi-close-circle float-right mt-1"></i>
                            </div>
                        @endif
          <table class="table table-radius">
            <thead>
            <tr class="btn-gradient-primary text-light fw-bold">
              <th>User yêu cầu</th>
              <th>Số điện thoại</th>
              <th>Vĩ độ</th>
              <th>Kinh độ</th>
              <th>Địa chỉ</th>
              <th>Mô tả tình trạng</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($supports as $key => $value)
                    <tr>
                    <td class="ml-3 border-r-0 ">
                      {{$value->User->name}}
                    </td>
                    <td> {{$value->phone}}</td>
                    <td>
                        {{$value->lat}}
                    </td>
                    <td>{{$value->long}}</td>
                    <td style="max-width: 100px;white-space: normal;">
                       {{$value->address}}
                    </td>
                    <td style="max-width: 200px;white-space: normal;">
                      {{$value->description}}
                    </td>
                    <td>
                        @if($value->status == 0) 
                        <p class="text-danger">Đã hủy</p>
                        @elseif($value->status == 3)
                        <p class="text-success">Đã hoàn thành</p>
                        @else
                        <select class="form-control form-control-lg select-status" data-id="{{$value->id}}" name="status" id="status">
                            <option  class="text-danger" value="0" <?php echo $value->status == 0 ? "selected" : "" ?>>
                                <span>Hủy yêu cầu</span>
                            </option>
                            <option class="text-warning" value="1" <?php echo $value->status == 1 ? "selected" : "" ?>>
                                <span >Đang xác nhận</span>
                            </option>
                            <option class="text-primary" value="2" <?php echo $value->status == 2 ? "selected" : "" ?>>
                                <span >Đang đợi SOS</span>
                            </option>
                            <option class="text-success" value="3" <?php echo $value->status == 3 ? "selected" : "" ?>>
                                <span >Hoàn thành</span>
                            </option>
                        </select>
                        @endif   
                    </td>
                    <td>  
                        <form  action="{{route('sos.destroy',[$value->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick ="return confirm('Bạn muốn xóa yêu cầu này ?');" type="submit " class="btn btn-gradient-primary p-1"><i class="mdi mdi-delete-forever"></i></button>
                        <a href="{{route('sos.edit', [$value->id])}}" class="btn btn-view btn-outline-dark p-1"><i class="mdi mdi-table-edit"></i></a>
                      </form></td>
                    </tr>
                @endforeach    
            </tbody>
            <tfoot>
                <thead>
                    <tr>
                        <th>User yêu cầu</th>
                        <th>Số điện thoại</th>
                        <th>Vĩ độ</th>
                        <th>Kinh độ</th>
                        <th>Địa chỉ</th>
                        <th>Mô tả tình trạng</th>
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
    <script type="text/javascript">
        $('.select-status').change(function(event) {
            const status = $(this).val();
            const id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            Swal.fire({
                    title: "Loading...",
                    html: "Đang xử lý",
                    allowOutsideClick: false,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    });
            $.ajax({
                url:"{{route('support-status')}}",
                method:"POST",
                data:{status:status,id:id, _token:_token},
                success:function(data){
                    Swal.fire({
                    title: "Thay đổi trạng thái cập thành công",
                    text: data.message,
                    icon: "success"
                    })
                }
            });

        });
    </script>
@endsection