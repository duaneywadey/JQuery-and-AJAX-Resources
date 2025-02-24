<?php  
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn,$user,$password);
$pdo->exec("SET time_zone = '+08:00';");

function getAllUsers($pdo) {
	$response = array();
	$sql = "SELECT * FROM mock_data";
	$stmt = $pdo->prepare($sql);
	$execQuery = $stmt->execute();
	if ($execQuery) {
		$response = array(
			"status"=>"200",
			"rowCount" => $stmt->rowCount(),
			"getAllUsers" => $stmt->fetchAll()
		);
	}
	return $response;
}

function getAllUsersForPagination($pdo, $offset, $totalRecordsPerPage) {
	$response = array();
	$sql = "SELECT * FROM mock_data 
			ORDER BY first_name ASC
			LIMIT $offset, $totalRecordsPerPage
			";
	$stmt = $pdo->prepare($sql);
	$execQuery = $stmt->execute();

	if ($execQuery) {
		$response = array(
			"status"=>"200",
			"getAllUsers"=> $stmt->fetchAll()
		);
	}

	return $response;
}


function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM mock_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$user_id])) {
		echo json_encode($stmt->fetch());
	}

}


function updateUser($pdo, $first_name, $last_name, $email, $user_id) {
	$sql = "UPDATE mock_data SET 
				first_name = ?,
				last_name = ?,
				email = ?
			WHERE id = ?
			";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$first_name, $last_name, $email, $user_id])) {
		return true;
	}
}

function deleteUser($pdo, $user_id) {
	$sql = "DELETE FROM mock_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$user_id])) {
		return true;
	}
}

?>