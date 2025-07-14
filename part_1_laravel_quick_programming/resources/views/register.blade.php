<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Register</title>
</head>
<body>
<h1>Register now!</h1>
@if($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
<form action="{{ route('registersave') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name here" required><br>
    <input type="email" name="email" placeholder="email here" required><br>
    <input type="password" name="password" placeholder="password here" required><br>
    <input type="password" name="password_confirmation" placeholder="confirm password here" required><br>
    <input type="submit" value="Register!">
</form>
</body>
</html>
