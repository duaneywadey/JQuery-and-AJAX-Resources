<?php  
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['getUserById'])) {
	$getUserById = getUserById($pdo, $_GET['user_id']);
	echo json_encode($getUserById);
}

if (isset($_POST['addNewUserBtn'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email= $_POST['email'];
	$gender = $_POST['gender'];
	$ip_address = $_POST['ipaddress'];
	$quote = $_POST['quote'];

	if (insertNewUser($pdo, $first_name, $last_name, $email, $gender, $ip_address, $quote)) {
		header("Location: index.php");
	}
	
}

if (isset($_POST['editAUser'])) {
	$user_id = $_POST['user_id'];
	$first_name= $_POST['first_name'];
	$last_name= $_POST['last_name'];
	$email= $_POST['email'];
	$gender= $_POST['gender'];
	$ip_address= $_POST['ipaddress'];
	$quote= $_POST['quote'];
	if (editAUser($pdo, $first_name, $last_name, $email, $gender, $ip_address, $quote, $user_id)) {
		echo "success";
	}
}

?>