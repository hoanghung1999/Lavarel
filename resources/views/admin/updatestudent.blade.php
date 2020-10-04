@extends('admin.adminview')
@section('content')
<div class="panel panel-primary">
			<div class="panel-heading">
			
			<h2 class="text-center">Sửa thông tin </h2>
			</div>
			<div class="panel-body center__update">
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
				<form method="post" action="{{route('postUpdateStudent',['id'=>$user->id])}}">
					<div class="trungtam">
						<label><b>Tên Tài Khoản:</b></label>
						<input  required="true" type="text" class="" id="username" name="username" value="{{$user->username}}">
					</div>
					<div class="trungtam">
						<label><b>Họ Tên:</b></label>
						<input type="text" class="" id="name" name="name" value="{{$user->name}}" required>
					</div>

					<div class="trungtam">
						<label><b>Email:</b></label>
						<input type="text" class="" id="email" name="email" value="{{$user->email}}" required>
					</div>
					<div class="trungtam">
						<label><b>SĐT:</b></label>
						<input type="number" class="" id="sdt" name="phone" value="{{$user->phone}}"required>
					</div>
                    <div class="trungtam">
						<label><b>Chức Vụ:</b></label>
						<select name="level">
							<option value="0" selected >SV</option>
							<option value="1">QL</option>
						</select>
					</div>
					<button class="btn btn-success">Lưu</button>
					{{csrf_field()}}
				</form>	
			</div>
		</div>
@endsection