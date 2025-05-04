<?php  

require_once 'dbConfig.php';

function checkIfUserExists($pdo, $username) {
	// Intialize a response variable
	$response = array();

	// Check if user exists from the table
	$sql = "SELECT * FROM attendance_system_users WHERE username = ?";

	// Use prepared statements to handle query and check 
	// if query is executed successfully
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$username])) {

		// Get the array returned by query through fetch()
		$userInfoArray = $stmt->fetch();

		// If row count is greater than zero, it only means that 
		// the user already exists
		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}

		// If it's not greater than zero, it's not existing yet,
		// so the username should be allowed
		else {
			$response = array(
				"result"=> false,
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	// return the value for the response
	return $response;

}

function insertNewUser($pdo, $username, $first_name, $last_name, $password) {

	// Value for response will change 
	// depending on the conditional block met 
	$response = array();

	// We first check if the user exists already by calling the function
	$checkIfUserExists = checkIfUserExists($pdo, $username); 

	// If the result returned false, we can proceed in inserting the user to DB
	if (!$checkIfUserExists['result']) {

		$sql = "INSERT INTO attendance_system_users (username, first_name, last_name, is_admin, password) 
		VALUES (?,?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		if ($stmt->execute([$username, $first_name, $last_name, false, $password])) {
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