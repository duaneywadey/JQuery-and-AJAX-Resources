<?php 
require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_GET['checkUserBtn'])) {
	
	$checkUserInput = $_GET['checkUserInput'];
	$checkIfUserAlreadyRegistered = checkIfUserAlreadyRegistered($pdo, $checkUserInput);

	if ($checkIfUserAlreadyRegistered) {
		$message = "Sorry, " . $checkUserInput . " is already taken";
		echo $message;
	}


}

?>