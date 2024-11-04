<?php 
require_once 'dbConfig.php';

if (isset($_POST['insertNewUser'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$insertQuery  = insertIntoUsers($pdo, $first_name, $last_name, $email);

	if ($insertQuery) {
		echo "YES";
	}
	else {
		echo "ERROR";
	}

} 
?>