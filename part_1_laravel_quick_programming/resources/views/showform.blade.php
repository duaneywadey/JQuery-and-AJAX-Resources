<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Type something here</h1>
	@if(session('message'))
		<div style="color: green;">{{ session('message') }}</div>
	@endif

	<form action="{{route('handleForm')}}" method="POST">
		@csrf
		{{$errors}}
		<p><input type="text" name="firstName" placeholder="first name here"></p>
		<p><input type="text" name="middleName" placeholder="middle name here"></p>
		<p><input type="text" name="lastName" placeholder="last name here"></p>
		<p><input type="submit" name="submitBtn"></p>
	</form>	
</body>
</html>
