@extends('admin.adminview')
@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="text-center">Bai Tap</h2>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Và Tên</th>
                <th>Email</th>
                <th>Thời gian Nộp</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php $count=1; ?>
            @foreach($listsubmittask as $subtask)
            <tr>
                <td>  {{$count++}}  </td>
                <td>{{$subtask->name}}</td>
                <td>{{$subtask->email}}</td>
                <td>{{$subtask->time}}</td>
                
                <td><button class="btn btn-success"><a href='{{route("getfile",["link"=>$subtask->link])}}'>File<a></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection