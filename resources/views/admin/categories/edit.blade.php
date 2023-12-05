@extends('admin.layouts.master')
@section('title', "| Edit Categories")
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Categories </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
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
                        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            <div class="form-group">
                                <label for="exampleInputName1">Name:</label>

                                <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                            <label for="">Category Status</label>
                            <div class="form-check">
                                <label>
                                    <input type="radio" name="status" id="public" value="0" {{ $category->status == 0 ? 'checked' : '' }} />
                                    public
                                </label>
                                <label>
                                    <input type="radio" name="status" id="private" value="1" {{ $category->status == 1 ? 'checked' : '' }} />
                                    private
                                </label>
                            </div>
                        </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</a>
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
