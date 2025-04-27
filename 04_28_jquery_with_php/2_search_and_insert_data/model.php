<?php 
require_once 'dbcon.php';

function getRecentUsers($pdo) {
	$sql = "SELECT * FROM mock_data 
			ORDER BY id DESC LIMIT 5";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function insertAUser($pdo, $first_name, $last_name, $email, $gender) {
	$sql = "INSERT INTO mock_data (first_name,last_name,email,gender) VALUES(?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$first_name, $last_name, $email, $gender]);
}

function searchAUser($pdo, $keyword) {
	$sql = "SELECT * FROM mock_data WHERE CONCAT(first_name,last_name,email,gender) LIKE ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(["%".$keyword."%"]);
	return $stmt->fetchAll();
}

?>



