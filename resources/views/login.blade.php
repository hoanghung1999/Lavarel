
<html>
<head>
<title>login form</title>
<link rel="stylesheet" href="main.css">
</head>

<body>
<div class="center-block" align="center">
<form  method="post" action="{{route('login')}}">
	
  <div class="imgcontainer">
    <img src="{{asset('img/user.jfif')}}" class="rounded-circle" alt="Avatar" class="avatar" style="height:200px;width:200px;margin-top:60px">
  </div>

  <div class="container container_List">
  
		<div>
    <label for="uname"><b>Username:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
		</div>
		<div style="margin-top: 10px;">
    <label for="psw"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
		</div>
		
		<div style="margin-top: 10px;">
    <button type="submit">Login</button>
		</div>
  </div>
    {{csrf_field()}}
  </form>

</div>
<body>
