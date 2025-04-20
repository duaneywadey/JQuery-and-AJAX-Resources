<?php 

function getAllUsers($conn) {
	$sql = "SELECT * FROM mock_data";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function searchAUser($conn, $keyword) {
	$sql = "SELECT * FROM mock_data WHERE CONCAT(first_name,last_name) LIKE ? LIMIT 5";
	$stmt = $conn->prepare($sql);
	$stmt->execute(["%".$keyword."%"]);
	return $stmt->fetchAll();
}


?>