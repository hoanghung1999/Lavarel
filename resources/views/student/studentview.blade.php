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
  <link rel="stylesheet" href="{{asset('css/givetask.css')}}">


</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav ">
      <li class="active" onclick="window.open('fuctionforsv.php','_self')"><a>Home</a></li>
      <li><a href="{{route('recievetask')}}">Xem bài tập</a></li>
      <li><a onclick="window.open('message.php', '_self')" >Xem tin nhắn</a></li>

      
      <li><a href="{{route('inforuserforstudent')}}">Xem thông tin người dùng</a></li>
      <li><a  href="{{route('getUpdateProfileForStudent',['id'=>Auth::user()->id])}}">Sửa thông tin cá nhân</a></li>
      <li><a href="{{route('logout')}}">Thoát</a></li>
    </ul>
  </div>
</nav>
<div class="container" style="margin: auto;">
  @yield('content')
</div>
@yield('script')
</body>
</html>