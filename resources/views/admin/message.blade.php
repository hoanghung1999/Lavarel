@extends('admin.adminview')
@section("content")
<h4 style="color: red;">Tin Nhắn</h4>
@foreach($listUserChatWithMe as $user)
<div class="container body" style="margin:10px auto;">
            <img src="{{asset('img/user.jfif')}}" alt="Avatar" style="width:100%;">
            <p style="text-align: center;"><b style="font-size:25px;color:red;">{{$user->name}}</b><br>
            <a href='{{route("getmessdetailA",["id"=>$user->idfrom])}}'>Xem</a></p>   
</div>
@endforeach
@endsection