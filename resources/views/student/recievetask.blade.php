@extends('student.studentview')
@section("content")
<?php
echo '<h3 class="text-center" style="color:red">Bài Tập</h3>'
?>
@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
@foreach($listtask as $task)
<div class="container body" style="margin: auto;">
    <img src="{{asset('img/task.webp')}}" alt="Avatar" style="width:100%;">
    <p><b style="color:red">{{$task->tieude}}</b><br><br>
        <a href="{{$task->link}}">tải đề xuống</a>
        <form action="{{route('submittask',['id'=>$task->id])}}" method="post" align="right" enctype="multipart/form-data">
            <input type="file" name="subtask" style="display:inline-block">
            <input type="submit" name="submittask" value="Nộp Bài">
            {{csrf_field()}}
        </form>
    </p>
    <span class="time-right"> từ <span style="color:red">{{$task->ngaybatdau}} </span> đến  <span style="color:red">{{$task->ngayketthuc}} </span> </span>
</div>
@endforeach
@endsection