@extends('admin.adminview')
@section('content')
<div class="panel panel-primary">
			<div class="panel-heading">
			
			<h2 class="text-center">Sửa thông tin cá nhân </h2>
			</div>
			<div class="panel-body center__update">
				<form method="post" action="updateprofileex.php">
					<div class="trungtam">
						<label><b>Tên Tài Khoản:</b></label>
						<input readonly="readonly" required="true" type="text" class="" id="username" name="username" value="">
					</div>

					<div class="trungtam">
						<label ><b>Mật Khẩu:</b></label>
						<input type="password" class="" id="password" name="password" value="" required>
					</div>

					<div class="trungtam">
						<label><b>Họ Tên:</b></label>
						<input type="text" class="" id="name" name="name" value="" readonly="readonly">
					</div>

					<div class="trungtam">
						<label><b>Email:</b></label>
						<input type="text" class="" id="email" name="email" value=""required>
					</div>
					<div class="trungtam">
						<label><b>SĐT:</b></label>
						<input type="number" class="" id="sdt" name="sdt" value=""required>
					</div>

					<div class="trungtam">
						<label><b>Chức Vụ:</b></label>
						<input readonly="readonly" type="text" class="" id="chucvu" name="chucvu" value="" required>
						
					</div>
					<button class="btn btn-success">Save</button>
				</form>	
			</div>
		</div>
@endsection