@extends('admin.adminview')
@section('content')
 <h1 class="text-center" style='margin:10%;color:red;'>Admin:<b>{{Auth::user()->name}}</b></h1>
@endsection