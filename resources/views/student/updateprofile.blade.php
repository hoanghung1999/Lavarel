@extends('student.studentview')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">

		<h2 class="text-center">Sửa thông tin cá nhân </h2>
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
		<form method="post" action="{{route('postUpdateProfileForStudent',['id'=>$user->id])}}">
			<div class="trungtam">
				<label><b>Tên Tài Khoản:</b></label>
				<input readonly="readonly" required="true" type="text" class="" id="username" name="username" value="{{$user->username}}">
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
				<input type="number" class="" id="sdt" name="phone" value="{{$user->phone}}" required>
			</div>

			<div class="trungtam">
				<label><b>Chức Vụ:</b></label>
				<input readonly="readonly" type="text" class="" id="chucvu" name="chucvu" 
				@if($user->level==1)
				value="QL"
				@else
				value="SV"
				@endif
				required
				>
			</div>
			<div class="trungtam">

				<label><input type="checkbox" name="changepassword" id="changePass"><b> Đổi Mật Khẩu:</b></label>
				<input type="password" class="password" id="password" name="password" disabled="">
			</div>
			<button class="btn btn-success">Save</button>
			{{csrf_field()}}
		</form>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$("#changePass").change(function() {
			if ($(this).is(":checked")) {
				$(".password").removeAttr('disabled');
			} else {
				$(".password").attr('disabled', '');
			}
		})
	})
</script>
@endsection