@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add Categories </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Categories</h4>
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
                        <form class="forms-sample" method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name : </label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Category Status</label>
                                <div class="form-check">
                                    <label class="radio-label">
                                        <input type="radio" name="status" id="public" value="0" checked />
                                        <span class="radio-custom"></span>
                                        <span class="radio-text">Public</span>
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="status" id="private" value="1" checked />
                                        <span class="radio-custom"></span>
                                        <span class="radio-text">Private</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Add</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
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

<!-- content-wrapper ends -->
@endsection
