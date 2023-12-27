@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
          <div class="content-wrapper">
            @include('admin.layouts.link-bar',['name'=>'Quản lý tuyến đường bị cấm','link'=>'list-row'])
            <div class="row">
              <div class="card p-0">
                <div class="card-header w-100 d-flex">
                  <h6 class=" mt-2">Danh sách bãi đổ xe</h6>
                  <a class="ml-auto plus-btn btn-gradient-primary" href="{{ route('Prohibited.create') }}"> + </a>
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
                  <table id="example1" class="table table-radius">
                    <thead>
                    <tr class="btn-gradient-primary text-light fw-bold">
                      <th> Tuyến đường </th>
                      <th> Kinh độ bắt đầu </th>
                      <th> Kinh độ kế thúc</th>
                      <th> Vĩ độ bắt đầu  </th>
                      <th> Vĩ độ kết thúc  </th>
                    <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $data)
                      <tr>
                                    <td>{{ $data->Route }}</td>
                        <td>{{ $data->start_longitude }}</td>
                                    <td>{{ $data->end_longitude }}</td>
                                    <td>{{ $data->start_Latitude }}</td>
                                    <td>{{ $data->end_Latitude }}</td>
                      <td>
                            <form method="POST" action="{{ route('Prohibited.destroy', $data->id) }}">
                              @csrf
                              @method('DELETE')
                              <button onclick ="return confirm('Bạn muốn xóa tuyến đường này ?');" type="submit " class="btn btn-gradient-primary p-1"><i class="mdi mdi-delete-forever"></i></button>
                              <a href="{{ route('Prohibited.edit', $data->id) }}" class="btn btn-view btn-outline-dark p-1"><i class="mdi mdi-table-edit"></i></a>
                            </form>
                    </td>
                      </tr>
                      @endforeach  
                    </tbody>
                    <tfoot>
                        <thead>
                            <tr>
                              <th> Tuyến đường </th>
                              <th> Kinh độ bắt đầu </th>
                              <th> Kinh độ kế thúc</th>
                              <th> Vĩ độ bắt đầu  </th>
                              <th> Vĩ độ kết thúc  </th>
                            <th>Thao tác</th>
                            </tr>
                            </thead>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>
        <script type="text/javascript">
$('.checkbox-active').click(function(){
  var id= $(this).data('id');
  var _token = $('input[name="_token"]').val();
  $.ajax({
    url:"{{URL::to('category/update_active')}}",
    method:"POST",
    data: {id:id,_token:_token},
    success:function(data){
      alert(data.message);
    }
  });
});
</script>
<style>
    /* Style for radio buttons */
.form-check {
    margin-top: 8px;
}

.radio-label {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    padding-left: 25px;
    margin-right: 15px;
    cursor: pointer;
    font-size: 16px;
}

.radio-label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.radio-custom {
    position: absolute;
    top: 0;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff;
    border: 1px solid #999;
    border-radius: 50%;
}

.radio-text {
    margin-left: 30px;
}

/* Style for checked radio buttons */
.radio-label input:checked ~ .radio-custom:after {
    content: '';
    position: absolute;
    display: block;
    top: 4px;
    left: 4px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #333;
}

</style>
          <!-- content-wrapper ends -->
@endsection
