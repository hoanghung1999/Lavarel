@extends('student.studentview')
@section('content')
<div class="card" style="width:45%;margin:0 auto;">
    <img class="" src="{{asset('img/user.jfif')}}" alt="Card image" style="width:46%">
    <div class="card-body">
        <h5 class="card-title"><b>Họ và Tên:</b><i style="color:red">{{$user->name}}</i></h5>
        <h5 class="card-text"><b>Chức Vụ:
        </b><i style="color:red">
        @if($user->level==1)
        QL
        @else
        SV
        @endif</i></h5>
        <h5 class="card-text"><b>Email:</b>&emsp;<i style="color:red">{{$user->name}}</i></h5>
        <h5 class="card-text"><b>Sđt:</b>&emsp;<i style="color:red">{{$user->phone}}</i></h5><b>Gửi tin nhắn :</b>
        <form method="post" action="{{route('postmess',['id'=>$user->id])}}">
            <input type="text" name="valuemess" style="width:30%"><br>
            <input type="submit" name="submess" value="gửi"><br>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection