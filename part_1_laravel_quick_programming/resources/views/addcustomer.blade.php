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
	@if(session('message'))
		<div style="color: green;">{{ session('message') }}</div>
	@endif
	<form action="{{route('insertcustomer')}}" method="POST">
		@if(Auth::user())
			<h3>Add new customer. Hello there! {{ Auth::user()->name }}</h3>
			{{ Auth::user() }}
		<a href="{{route('logout')}}">Logout</a>
		@endif

		<div style="color: red;">
			@foreach($errors->all() as $error)
				{{$error}}<br>
			@endforeach
		</div>
		@csrf
		<input type="text" name="name" placeholder="Customer name"><br>		
		<input type="email" name="email" placeholder="Customer email"><br>		
		<input type="number" name="age" placeholder="Customer age"><br>
		<input type="submit" value="Save">		
	</form>
	<table style="border: solid thin #aaa;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Age</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($customers))
				@foreach($customers as $customer)
				<tr>
					<td>{{$customer->name}}</td>
					<td>{{$customer->email}}</td>
					<td>{{$customer->age}}</td>
					<td>
						<form action="{{ route('deletecustomer', $customer->id) }}" method="POST" style="display:inline;">
						    @csrf
						    <input type="submit" value="Delete">
						</form>
					</td>
					<td>
						<a href="{{route('editcustomer', $customer->id) }}">Edit</a>
					</td>
				</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</body>
</html>

