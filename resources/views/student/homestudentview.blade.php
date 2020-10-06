@extends('student.studentview')
@section('content')
<h1 class="text-center " style='margin-top:10% ;color:red;'>Student:<b>{{Auth::user()->name}}</b></h1>
@endsection