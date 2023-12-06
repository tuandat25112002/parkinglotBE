@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Danh Sách tuyến đường bị cấm </h3>
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categories.create') }}">Add Category</a></li>
                </ol>
            </nav> -->
            </div>
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="col-md-12 text-right mb-3" style=" margin-left: 40px;">
                    <a href="{{ route('Prohibited.create') }}" class="btn btn-primary">Add Category</a>
                </div>
                <div class="card-body">
                    <div class="col-md-12 text-right mb-3">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                                @if (session('status'))
                        <div class="alert container-fluid alert-success" role="alert">
                                {{session('status')}} <i id="close" class="fas fa-times float-right mt-1"></i>
                            </div>
                        @endif
                </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Router </th>
                          <th> Start Longitude </th>
                          <th> End Longitude</th>
                          <th> Start Latitude  </th>
                          <th> End Latitude  </th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($data as $data)
					<tr>
						<th>{{ $data->id }}</th>
                        <td>{{ $data->Router }}</td>
						<td>{{ $data->start_longitude }}</td>
                        <td>{{ $data->end_longitude }}</td>
                        <td>{{ $data->start_Latitude }}</td>
                        <td>{{ $data->end_Latitude }}</td>
                        <td>
            <form method="POST" action="{{ route('Prohibited.destroy', $data->id) }}">
                @csrf
                @method('DELETE')
                <a href="{{ route('Prohibited.edit', $data->id) }}" class="btn btn-success">
                    Sửa
                </a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Xoá</button>
            </form>
        </td>
					</tr>
					@endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                </div>
              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
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
?>
