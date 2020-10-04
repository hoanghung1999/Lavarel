
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="fuctionforQL.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/updateprofile.css')}}">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav ">
      <li><a href="{{route('adminhome')}}">Home</a></li>
      <li><a href="{{route('inforstudent')}}">Giao Bài Tập</a></li>
      <!-- <li><a onclick="window.open('message', '_self')">Xem Tin Nhắn</a></li> -->
      <li><a href="">Hộp thư đến</a></li>
      <li><a href="{{route('inforstudent')}}">Thông Tin Sinh Viên</a></li>

      <li><a href="{{route('inforuser')}}">Thông Tin Người Dùng</a></li>
      
      <li><a href="{{route('getUpdateprofile',['id'=>Auth::user()->id])}}">Sửa Thông Tin Cá nhân</a></li>
      <li><a href="{{route('logout')}}">Thoát</a></li>
    </ul>
  </div>
</nav>
@if(Auth::check())
<div class="container">
  @yield('content')
</div>
@endif
@yield('script')
</body>
</html>