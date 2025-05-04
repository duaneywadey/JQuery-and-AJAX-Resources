<?php  
require_once 'dbConfig.php';
require_once 'models.php';

// If we get to this PHP file and the variable, insertNewUserBtn, 
// has a value, execute the code below
if (isset($_POST['insertNewUserBtn'])) {

	// We get rid of whitespaces by using the trim() function
	$username = trim($_POST['username']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	// We check if the input fields are empty or not
	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($confirm_password)) {

		// If the input typed in the password field 
		// is the same as confirm_password, execute 
		// the code below
		if ($password == $confirm_password) {

			// Execute the insertNewUser method (from models.php)
			$insertQuery = insertNewUser($pdo, $username, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT));

			// Set a 'message' session variable with value 
			// coming from the array insertNewUser method returned 
			$_SESSION['message'] = $insertQuery['message'];	

			// If the status of the request is 200, it only means 
			// the request is successful
			if ($insertQuery['status'] == '200') {

				// Set a 'message' session variable with value 
				// coming from the array insertNewUser method returned
				// if the request is successful 
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {

				// Set a 'message' session variable with value 
				// coming from the array insertNewUser method returned
				// if the request failed
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {

			// Set a 'message' session variable with value 
			// indicating two password fields are unequal
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}

	}

	else {
		// Set a 'message' session variable with value 
		// indicating an empty input field is present
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}
}

// If we get to this PHP file and the variable, loginUserBtn, 
// has a value, execute the code below
if (isset($_POST['loginUserBtn'])) {

	// Making sure no whitespaces
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	// If else to check for empty input fields
	if (!empty($username) && !empty($password)) {

		// Checking if the user exists in the database
		$loginQuery = checkIfUserExists($pdo, $username);

		// If user exists, we store his credentials in an array shown below
		$userIDFromDB = $loginQuery['userInfoArray']['user_id'];
		$usernameFromDB = $loginQuery['userInfoArray']['username'];
		$passwordFromDB = $loginQuery['userInfoArray']['password'];

		// But first we have to check if password is correct
		if (password_verify($password, $passwordFromDB)) {

			// If it's correct, we set a new value 
			// for the session variables
			$_SESSION['user_id'] = $userIDFromDB;
			$_SESSION['username'] = $usernameFromDB;

			// Let's go back to index.php, we have " ../ "
			// since index.php is not in the same directory we're in
			header("Location: ../index.php");
		}

		// If the password is incorrect
		else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	}

	// If an empty input field exists, we are redirected to register.php
	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}

// If we logout, we just unset the value for username
// currently active in the session
if (isset($_GET['logoutUserBtn'])) {
	unset($_SESSION['username']);
	header("Location: ../login.php");
}