@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Danh sách bãi đổ xe </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý bãi đổ xe</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-header w-100 d-flex">
          <h6 class=" mt-2">Danh sách bãi đổ xe</h6>
          <a class="ml-auto plus-btn btn-gradient-primary" href="{{route('new-park')}}"> + </a>
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
              <th>Hình ảnh</th>
              <th>Bãi đổ xe</th>
              <th>Vĩ độ</th>
              <th>Kinh độ</th>
              <th>Số chỗ</th>
              <th>Tổng số chỗ</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($parkings as $key => $value)
                    <tr>
                    <td class="ml-3 border-r-0 ">
                      <div class="cover-image"><img src="{{$value->image[0]}}" >
                        @if(count($value->image)>1)
                        <button class="btn-gradient-primary">+{{count($value->image) -1 }}</button>
                        @endif
                      </div>
                    </td>
                    <td> {{$value->name}}</td>
                    <td>
                        {{$value->lat}}
                    </td>
                    <td>{{$value->long}}</td>
                    <td>
                       {{$value->slot}}
                    </td>
                    <td>
                      {{$value->max}}
                    </td>
                    <td>  
                        <form  action="{{route('parks.destroy',[$value->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick ="return confirm('Bạn muốn xóa bãi đổ xe này ?');" type="submit " class="btn btn-gradient-primary p-1"><i class="mdi mdi-delete-forever"></i></button>
                        <a href="{{route('parks.edit', [$value->id])}}" class="btn btn-view btn-outline-dark p-1"><i class="mdi mdi-table-edit"></i></a>
                      </form></td>
                    </tr>
                @endforeach    
            </tbody>
            <tfoot>
                <thead>
                    <tr>
                      <th>Hình ảnh</th>
                      <th>Bãi đổ xe</th>
                      <th>Vĩ độ</th>
                      <th>Kinh độ</th>
                      <th>Số chỗ</th>
              <th>Tổng số chỗ</th>
                      <th>Thao tác</th>
                    </tr>
                    </thead>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
@endsection