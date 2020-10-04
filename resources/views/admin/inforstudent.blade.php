@extends('admin.adminview')
@section('content')
<h2 class="text-center pannel pannel-heading">Quản lý thông tin sinh viên </h2>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Họ & tên</th>
            <th>email</th>
            <th>SDT</th>
            <th>Chức vụ</th>
            <th width="60px"></th>
            <th width="60px"></th>
        </tr>
    </thead>
    <tbody>
         <?php $stt = 1; ?>
        @foreach($listStudent as $user)
        <tr>
            <td>{{$stt++}} </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>Sinh Vien</td>
            

            <td><button class="btn btn-warning" onclick="window.open('update/{{$user->id}}','_self')">Edit</button></td>
            <td><button class="btn btn-danger" onclick="window.open('deleteStudent/{$user->id}', '_self')">Delete</button></td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="">
    <button type="button" class="btn btn-primary" onclick="window.open('adduser', '_self')">Thêm Người dùng</button>
</div>
@endsection