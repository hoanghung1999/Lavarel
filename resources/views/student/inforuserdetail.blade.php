@extends('student.studentview')
@section('content')
<div class="card" style="width:45%;margin:0 auto;">
    <img class="" src="user.jfif" alt="Card image" style="width:46%">
    <div class="card-body">
        <h5 class="card-title"><b>Họ và Tên:</b> <i style="color:red"></i></h5>
        <h5 class="card-text"><b>Chức Vụ:</b><i style="color:red"></i></h5>
        <h5 class="card-text"><b>Email:</b>&emsp;<i style="color:red"></i></h5>
        <h5 class="card-text"><b>Sđt:</b>&emsp;<i style="color:red"></i></h5><b>Gửi tin nhắn :</b>
        <form method="post" action="messageDAO.php?id='.$idto.'">
            <input type="text" name="message" style="width:30%"><br>
            <input type="submit" name="submess" value="gửi"><br>
        </form>
    </div>
</div>
@endsection