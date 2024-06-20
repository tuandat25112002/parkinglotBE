@extends('admin.layouts.master')
@section('content')
<style>
    #map { height: 500px; }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        @include('admin.layouts.link-bar',['name'=>'Quản lý hỗ trợ SOS','link'=>'list-support','sub_link'=>'Cập nhật hỗ trợ SOS'])
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cập nhật hỗ trợ SOS</h4>
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
                        <form action="{{route('sos.update',[$support->id])}}" method="POST" class="pt-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{$support->phone}}" placeholder="Số điện thoại liên hệ">
                                        <p id="name-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div id="map"></div>
                                      <div class="form-group mt-5">
                                        <input type="text" class="form-control form-control-lg" id="address" disabled="true" name="address" value="{{$support->address}}" placeholder="Địa chỉ">
                                        <p id="address-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div class="row">
                                          <div class="form-group col-md-6">
                                              <input type="text" class="form-control form-control-lg" id="lat" disabled="true" name="lat" value="{{$support->lat}}" placeholder="Vĩ độ">
                                              <p id="lat-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <input type="text" class="form-control form-control-lg" id="long" disabled="true" name="long" value="{{$support->long}}" placeholder="Kinh độ">
                                              <p id="long-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="editor">Mô tả tình trạng (<span class="required">*</span>):</label>
                                        <textarea class="form-control" id="editor" name="description" rows="5" resize="none"><?php echo $support->description?></textarea>
                                      </div>
                                      <div class="form-group">
                                        <select class="form-control form-control-lg select-status" data-id="{{$support->id}}" name="status" id="status">
                                            <option  class="text-danger" value="0" <?php echo $support->status == 0 ? "selected" : "" ?>>
                                                <span>Đã hủy</span>
                                            </option>
                                            <option class="text-warning" value="1" <?php echo $support->status == 1 ? "selected" : "" ?>>
                                                <span >Đang xác nhận</span>
                                            </option>
                                            <option class="text-primary" value="2" <?php echo $support->status == 2 ? "selected" : "" ?>>
                                                <span >Đang đợi SOS</span>
                                            </option>
                                            <option class="text-success" value="3" <?php echo $support->status == 3 ? "selected" : "" ?>>
                                                <span >Hoàn thành</span>
                                            </option>
                                        </select> 
                                      </div>          
                                </div>
                                <div class="col-md-5">
                                    <div class="h3">Thông tin người cần hỗ trợ</div>
                                    <div class="d-flex">
                                        <div class="avatar text-center">
                                            <img class="col-md-3 " src="<?php
                                            echo $support->User->avatar != null ? $support->User->avatar : 
                                            "https://res.cloudinary.com/dcugpagjy/image/upload/v1718611748/avatar/avatar-default_aq0mwv.png"
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-8 p-2 m-auto text-center">
                                            <p class="text-primary h4">{{$support->User->name}}</p>
                                            <p><b>Email: </b> {{$support->User->email}}</p>
                                            <p><b>Ngày gửi yêu cầu: </b> {{$support->created_at}}</p>
                                            <p><b>Liên lạc: </b><a href="tel:0946234470">0946234470</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                              <input type="submit" id="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Cập nhật">
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
var map_init = L.map('map', {
    center: [{{$support->long}}, {{$support->lat}}],
    zoom: 8
});
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map_init);

L.Control.geocoder().addTo(map_init);
if (!navigator.geolocation) {
    console.log("Your browser doesn't support geolocation feature!")
} else {
    navigator.geolocation.getCurrentPosition(getPosition)
};
var marker, circle, lat, long, accuracy;

function getPosition(position) {
    // console.log(position)
    lat = {{$support->lat}}
    long = {{$support->long}}
    accuracy = 0

    if (marker) {
        map_init.removeLayer(marker)
    }

    if (circle) {
        map_init.removeLayer(circle)
    }

    marker = L.marker([lat, long])
    circle = L.circle([lat, long], { radius: accuracy })

    var featureGroup = L.featureGroup([marker, circle]).addTo(map_init)

    map_init.fitBounds(featureGroup.getBounds())
}

</script>
<!-- content-wrapper ends -->
@endsection