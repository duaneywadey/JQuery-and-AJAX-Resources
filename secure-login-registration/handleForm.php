<?php 
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
	$conn = new PDO($dsn, $user, $password);
	$conn->exec("SET time_zone = '+08:00';");

} catch (PDOException $e) {
	die("Error : ".$e->getMessage());
}

if (isset($_POST['regBtn'])) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$query = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$username]);
	
	if($stmt->rowCount() == 1) {
		header('Location: register.php');	
	}
	else {
		$query = "INSERT INTO users (username,password) VALUES (?,?)";
		$stmt = $conn->prepare($query);
		$stmt->execute([$username, $password]);
		$_SESSION['welcomeMessage'] = "Registered successfully!";
		header('Location: index.php');
	}
	
}

if (isset($_POST['loginBtn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE username=?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$username]);

	if($stmt->rowCount() == 1) {
		
		// returns associative array
		$row = $stmt->fetch();

		// store user info as a session variable
		$_SESSION['userInfo'] = $row;

		$uid = $row['id'];
		$uname = $row['username'];
		$passHash = $row['password'];

		if(password_verify($password, $passHash)) {
			$_SESSION['user_id'] = $uid;
			$_SESSION['username'] = $uname;
			$_SESSION['email'] = $email;
			$_SESSION['userLoginStatus'] = 1;
			header('Location: index.php');
		}
		else {
			return 'Wrong password';
		}
	}

}

?>