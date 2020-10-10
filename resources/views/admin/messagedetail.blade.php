@extends('admin.adminview')
@section('content')
<h1 class="text-center">Message</h1>
@foreach($listmess as $mess)
@if($mess->idfrom==Auth::user()->id)
<div class="container darker body" style="margin: auto;">
    <p>YOU</p>
    <img src="{{asset('img/user.jfif')}}" alt="Avatar" style="width:100%;">
    <p>{{$mess->message}}</p>
    <a style="margin-left: 93%;" href="{{route('deleteMessA',['id'=>$mess->id,'idto'=>$mess->idto])}}">Xóa</a>
</div>
@else
<div class="container  body" style="margin: auto;">
    <p style="margin-left: 93%;">{{$mess->name1}}</p>
    <img src="{{asset('img/user.jfif')}}" alt="Avatar" class="right" style="width:100%;">
    <p style="margin-left:50%;">{{$mess->message}}</p>
</div>
@endif
@endforeach
<div class="container  body" style="margin:auto;">
    <form method="post" action="{{route('postmessA',['id'=>$idfrom])}}">
        <input type="text" style="min-width:700px;" name="valuemess">
        <input type="submit" name="mess">
        {{csrf_field()}}
    </form>
</div>
@endsection