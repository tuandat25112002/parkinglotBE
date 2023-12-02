@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">All Categories </h3>
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
                    <div class="col-md-12 text-right mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
                </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Name </th>
                          <th>Trạng thái</th>
                          <th> Status </th>

                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
                        <!-- <td> -->
                      <!-- {{$category->active==1? '<span class="label label-success">Hiện</span>' : '<span class="label label-danger">Ẩn</span>'}} -->
                    <!-- </td> -->
                    <td>
    <label class="switch">
        <input type="checkbox" class="checkbox-active" data-id="{{ $category->id }}" {{ $category->active == 1 ? 'checked' : '' }}>
        <span class="slider round"></span>
    </label>
</td>

                        <td>
            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                @csrf
                @method('DELETE')
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">
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
          <!-- content-wrapper ends -->
@endsection
?>
