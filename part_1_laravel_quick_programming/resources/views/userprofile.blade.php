<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>User Profile</h1>
	<form action="{{route('edituserprofile')}}" method="POST">

		{{-- Don't @csrf forget when submitting post requests --}}
		@csrf
		
		<label for="#">Name</label>
		<input type="text" name="name" value="{{Auth::user()->name}}"><br>
		<input type="hidden" name="id" value="{{Auth::user()->id}}"><br>
		<label for="#">Email</label>
		<input type="text" name="email" value="{{Auth::user()->email}}">
		<input type="submit" value="Save">
	</form>
</body>
</html>

@php
echo "USER ID: " . $user_id;
@endphp