@extends('admin.adminview')
@section('content')

<h2 class="text-center">Thông Tin Người Dùng Hệ Thống </h2>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & tên</th>
					<th>Chức vụ</th>
					<th width="60px"></th>
				</tr>
			</thead>
			<tbody>
			@if(isset($listuser))
			<?php
			$stt=1;
			?>
			@foreach($listuser as $user)
			<tr>
				<td>{{$stt++}}</td>
				<td>{{$user->name}}</td>
				<td>
					@if($user->level==1)
					{{"QL"}}
					@else
					{{"SV"}}
					@endif
				</td>
				
<td><button class="btn btn-warning" onclick="window.open('user/detail/{{$user->id}}','_self')">Chi tiết</button></td>
		</tr>
			
			@endforeach
			@endif
			</tbody>
		</table>
	</div>
	<div class="col-sm-2"></div>
</div>


@endsection