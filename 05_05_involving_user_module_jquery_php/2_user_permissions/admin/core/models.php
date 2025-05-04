<?php  

require_once 'dbConfig.php';

function checkIfUserExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM attendance_system_users WHERE username = ?";
	$stmt = $pdo->prepare($sql);

	if ($stmt->execute([$username])) {

		$userInfoArray = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}

		else {
			$response = array(
				"result"=> false,
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	return $response;

}

function insertNewUser($pdo, $username, $first_name, $last_name, $password) {
	$response = array();
	$checkIfUserExists = checkIfUserExists($pdo, $username); 

	if (!$checkIfUserExists['result']) {

		$sql = "INSERT INTO attendance_system_users (username, first_name, last_name, is_admin, password) 
		VALUES (?,?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		if ($stmt->execute([$username, $first_name, $last_name, true, $password])) {
			$response = array(
				"status" => "200",
				"message" => "User successfully inserted!"
			);
		}

		else {
			$response = array(
				"status" => "400",
				"message" => "An error occured with the query!"
			);
		}
	}

	else {
		$response = array(
			"status" => "400",
			"message" => "User already exists!"
		);
	}

	return $response;
}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM attendance_system_users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllAttendancesByDate($pdo, $date_today) {
	$sql = "SELECT 
				attendance_system_users.first_name AS first_name, 
				attendance_system_users.last_name AS last_name,
				attendance_records.attendance_type AS attendance_type
			FROM attendance_system_users
			JOIN attendance_records ON 
			attendance_system_users.user_id = attendance_records.user_id 
			WHERE date_added = ?
			ORDER BY 
				attendance_system_users.last_name,
				attendance_records.date_added DESC
			";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$date_today]);
	return $stmt->fetchAll();
}

function getUsersWithIncompleteAttendance($pdo, $date_today) {
	$sql = "SELECT 
				attendance_system_users.user_id AS user_id, 
				attendance_system_users.first_name AS first_name, 
				attendance_system_users.last_name AS last_name
			WHERE user_id NOT IN (SELECT user_id FROM attendance_records WHERE attendance_type = ? date_added = ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$date_today]);
	return $stmt->fetchAll();
}