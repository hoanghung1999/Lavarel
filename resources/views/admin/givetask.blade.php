@extends('admin.adminview')
@section('content')
<p>
    <a class="btn btn-info btn-lg" onclick="addtask()">
        <span class="glyphicon glyphicon-plus"></span> Thêm Bài Tập
    </a>
    <div id="addtask"></div>
</p>
@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			{{$err}}<br>
			@endforeach
		</div>
@endif
@if(session('thongbao'))
<div class="alert alert-success">
    {{session('thongbao')}}
</div>
@endif

@foreach($listtask as $task)
<div class="container body" style="margin: 0 auto;">
    <img src="{{asset('img/task.webp')}}" alt="Avatar" style="width:100%;">
    <p> <b>{{$task->tieude}}</b>
        <br><a href='{{$task->link}}'>Tải xuống</a><br>
        <a href="{{route('listsubmittask',['id'=>$task->id])}}"> Xem Danh Sách Nộp Bài</a>
    </p>
    <span class="time-right" style="color:red;"> từ {{$task->ngaybatdau}}  đến  {{$task->ngayketthuc}}</span>
</div>
@endforeach

@endsection



@section('script')
<script>
    function addtask() {
        document.getElementById("addtask").innerHTML = '<form align="center" enctype="multipart/form-data" method="post" action="{{route("postgivetask")}}">' +
            '<label for="fname" style="min-width:120px;">Tiêu Đề:</label><input type="text" id="title" name="title" style="display:inline-block"><br><br>' +
            '<label for="sdate">Ngày bắt đầu:</label><input type="date" id="sdate" name="sdate" style="display:inline-block"><br><br>' +
            '<label for="edate">Ngày kết thúc:</label><input type="date" id="edate" name="edate" style="display:inline-block"><br><br>' +
            '<input type="file" name="task" style="display:inline-block"><br><br> ' +
            '<input type="submit" value="Thêm" name="submit">&ensp;<input type="submit" value="Hủy">{{csrf_field()}}</form>';
    }
</script>
@endsection