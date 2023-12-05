@extends('admin.layouts.master')
@section('title', "| Edit Categories")
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Sửa tuyến đường bị cấm </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sửa tuyến đường bị cấm</h4>
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
                        <form class="forms-sample" method="POST" action="{{ route('Prohibited.update', $Prohibited->id) }}">
                            @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            <div class="form-group">
                                <label for="exampleInputName1">Name:</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="Route" value="{{ $Prohibited->Route }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Start Longitude : </label>
                                <input type="text" class="form-control" id="exampleInputName1" name="start_longitude" placeholder="Name" value="{{ $Prohibited->start_longitude }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Start Latitude : </label>
                                <input type="text" class="form-control" id="exampleInputName1" name="start_Latitude" placeholder="Name" value="{{ $Prohibited->start_Latitude }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">End Longitude : </label>
                                <input type="text" class="form-control" id="exampleInputName1" name="end_longitude" placeholder="Name" value="{{ $Prohibited->end_longitude }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">End Latitude : </label>
                                <input type="text" class="form-control" id="exampleInputName1" name="end_Latitudes" placeholder="Name" value="{{ $Prohibited->end_Latitude }}">
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                            <a href="{{ route('Prohibited.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer content -->
</div>

<!-- content-wrapper ends -->
@endsection
