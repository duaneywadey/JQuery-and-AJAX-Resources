<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	@if(session('message'))
		<div style="color: red;">{{ session('message') }}</div>
	@endif
	<h1>Login now!</h1>
	@if($errors->any())
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	@endif
	<form action="{{ route('loginsave') }}" method="POST">
		@csrf
		<input type="email" name="email" placeholder="email here"><br>
		<input type="password" name="password" placeholder="password here"><br>
		<input type="submit" value="Login!">
	</form>
</body>
</html>