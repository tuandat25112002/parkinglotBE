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
                        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            <div class="form-group">
                                <label for="exampleInputName1">Name:</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $category->name }}">
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
