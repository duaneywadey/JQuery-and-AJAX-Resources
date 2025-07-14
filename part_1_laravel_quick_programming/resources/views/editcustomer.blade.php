<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="{{route('updatecustomer')}}" method="POST">
		<h3>Add new customer</h3>

		<div style="color: red;">
			@foreach($errors->all() as $error)
				{{$error}}<br>
			@endforeach
		</div>
		@csrf

		@if($data)
		<input type="text" name="name" placeholder="Customer name" value="{{$data->name}}"><br>		
		<input type="email" name="email" placeholder="Customer email" value="{{$data->email}}"><br>		
		<input type="number" name="age" placeholder="Customer age" value="{{$data->age}}"><br>
		<input type="hidden" name="id" value="{{$data->id}}">
		<input type="submit" value="Save">	
		@else
			<h3>Sorry! That customer cannot be found</h3>
		@endif

	</form>
</body>
</html>

