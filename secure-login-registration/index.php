<?php 
session_start();


if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}


// if(isset($_SESSION['userInfo'])) {
// 	$userInfo = $_SESSION['userInfo'];
// 	foreach ($userInfo as $key => $value) {
// 		echo $key . " - " . $value . "<br>";
// 	}
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: 'Arial';
			font-size: 2em;
		}

		.fields input {
			display: block;
			height: auto;
			width: 500px;
			margin-top: 10px;
			font-size: 2em;
		}
		#submitBtn {
			margin-top: 10px;
			height: auto;
			width: 300px;
			font-size: 2em;
		}
		#greeting {
			font-family: Verdana, Arial, Helvetica, sans-serif;
		}
	</style>
</head>
<body>
	<div id="greeting">
		Hello there,
		<?php if(isset($_SESSION['username'])) { 
			echo $_SESSION['username'];
		}?>
	</div>
	<a href="logout.php">Logout</a>
</body>
</html>