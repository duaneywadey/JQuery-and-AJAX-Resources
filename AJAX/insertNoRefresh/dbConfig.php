<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+08:00';");


function getAllUsers($pdo) {
	$sql = "SELECT * FROM mock_data ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute()) {
		return $stmt->fetchAll();
	}
}

function insertIntoUsers($pdo, $first_name, $last_name, $email) {
	$sql = "INSERT INTO mock_data (first_name, last_name, email) VALUES(?,?,?)";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$first_name, $last_name, $email])) {
		return true;
	}
}