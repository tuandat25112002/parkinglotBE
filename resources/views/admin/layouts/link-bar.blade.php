<div class="page-header">
    <h3 class="page-title"> Danh sách bãi đổ xe </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route($link)}}">{{$name}}</a></li>
        @if(isset($sub_link))
        <li class="breadcrumb-item active" aria-current="page">{{$sub_link}}</li>
        @endif
      </ol>
    </nav>
  </div>