@extends('admin.layouts.master')
@section('content')
<style>
    #map { height: 500px; }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Quản lý bãi đổ xe</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm bãi đổ xe</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                              <div class="alert alert-danger">
                                 {{ $error }} <i id="close" class="mdi mdi-close-circle float-right mt-1"></i>
                              </div>
                              @endforeach
                          @endif
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
                        <form id="register" action="{{route('parks.update',[$parking->id])}}" method="POST" class="pt-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{$parking->name}}" placeholder="Tên bãi đổ xe">
                                        <p id="name-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div id="map"></div>
                                      <div class="form-group mt-5">
                                        <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{$parking->address}}" placeholder="Địa chỉ">
                                        <p id="address-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                      <div class="row">
                                          <div class="form-group col-md-6">
                                              <input type="text" class="form-control form-control-lg" id="lat" name="lat" value="{{$parking->lat}}" placeholder="Vĩ độ">
                                              <p id="lat-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <input type="text" class="form-control form-control-lg" id="long" name="long" value="{{$parking->long}}" placeholder="Kinh độ">
                                              <p id="long-errors" class="text-danger mb-0 mt-1 "></p>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="editor">Mô tả (<span class="required">*</span>):</label>
                                        <textarea class="form-control" id="editor" name="description" rows="5" resize="none"><?php echo $parking->description?></textarea>
                                      </div>
                                      <div class="form-group">
                                          <input type="number" class="form-control form-control-lg" id="max" name="max" value="{{$parking->max}}" placeholder="Số lượng chỗ để xe">
                                          <p id="max-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>          
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group d-flex flex-column gap-2">
                                        
                                            <div class="filearray row"> 
                                                <label for="thumbnail" id="files" class="pip col-md-4 px-1 mb-2">
                                                    <img class="w-100" src="{{asset('admin/images/add-image.png')}}">
                                                </label> 
                                            </div>
                                            <label for="thumbnail" class="btn btn-gradient-primary">Thêm ảnh</label>
                                            <input type="file" name="image_tmp[]" id="thumbnail" multiple />  
                                            <input type="file" name="image[]" id="images" class="d-none" multiple />  
                                            <input type="input" name="image_delete" id="image_delete" class="d-none"/>
                                            <div class="filearray row"> 
                                                @foreach ($parking->image as $image) 
                                                <div class="pip_old col-md-4 px-1 mb-2">
                                                    <img class="w-100" src="{{$image}}">
                                                    <span class="remove_old" data-image="{{$image}}"><i class="mdi mdi-minus-circle"></i></span>
                                                </div> 
                                                @endforeach
                                            </div>
                                        <p id="image-errors" class="text-danger mb-0 mt-1 "></p>
                                      </div>
                                </div>
                            </div>
                            <div class="mt-3">
                              <input type="submit" id="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Cập nhật bãi đổ xe">
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#thumbnail").change(function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                    image_old = $("#images")[0].files;
                    var dat = new DataTransfer();
                    for (var fileIdx = 0; fileIdx < image_old.length; fileIdx++) {
                            dat.items.add(image_old[fileIdx]);
                        }
                    console.log(dat.files);
                    // var files_upload = $("#images")[0].files;
                    // var dt = new DataTransfer();
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i];
                    dat.items.add(files[i]);
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<div class=\"pip col-md-4 px-1 mb-2\">" +
                        "<img class=\"w-100\" src=\"" + e.target.result + "\" title=\"" +                       
                        file.name + "\"/>" +
                        "<br/><span class=\"remove\"><i class=\"mdi mdi-minus-circle\"></i></span>" +
                        "</div>").insertBefore("#files");

                    $('.remove').click(function(){
                            
                        var pips = $('.pip').toArray();
                        var $selectedPip = $(this).parent('.pip');
                        var index = pips.indexOf($selectedPip[0]);
                        var dt = new DataTransfer();
                        var files = $("#images")[0].files;
                        for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
                            if (fileIdx !== index) {
                                dt.items.add(files[fileIdx]);
                            }
                        }
                        $("#images")[0].files = dt.files;

                        $selectedPip.remove();
                    });

                    /*
                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });*/

                

                    });
                    fileReader.readAsDataURL(f);
                }
                    $("#images")[0].files = dat.files;
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
            $('#submit').click(function(){
                let timerInterval;
                    Swal.fire({
                    title: "Loading...",
                    html: "Đang xử lý",
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    })
            })
            });
            $('.remove_old').click(function(e){
                e.preventDefault();
                var pips = $('.pip_old').toArray();
                
                var $selectedPip = $(this).parent('.pip_old');
                var image = $(this).data('image');
                var val =  $("#image_delete").val()
                $("#image_delete").val(val+image+","); 
                console.log($("#image_delete").val());
                $selectedPip.remove();
            });
    </script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
var map_init = L.map('map', {
    center: [{{$parking->long}}, {{$parking->lat}}],
    zoom: 8
});
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map_init);

function onMapClick(e) {
  // user clicked on a map
  fetch(`https://api.geoapify.com/v1/geocode/reverse?lat=${e.latlng.lat}&lon=${e.latlng.lng}&apiKey=cc0f6c8b272b455b9d965226fd386ee3`)
  .then(response => response.json())
  .then(result => {
    if (result.features.length) {
      const address = result.features[0].properties.formatted;
      L.popup().setLatLng(e.latlng).setContent(address).openOn(map_init);
      document.getElementById("address").value = address;
      document.getElementById("long").value = e.latlng.lng; 
      document.getElementById("lat").value = e.latlng.lat;
    } else {
      L.popup().setLatLng(e.latlng).setContent("No address found").openOn(map_init);
    }
  });
}

map_init.on('click', onMapClick);

L.Control.geocoder().addTo(map_init);
if (!navigator.geolocation) {
    console.log("Your browser doesn't support geolocation feature!")
} else {
    navigator.geolocation.getCurrentPosition(getPosition)
};
var marker, circle, lat, long, accuracy;

function getPosition(position) {
    // console.log(position)
    lat = {{$parking->lat}}
    long = {{$parking->long}}
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

    console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
}

</script>
<!-- content-wrapper ends -->
@endsection