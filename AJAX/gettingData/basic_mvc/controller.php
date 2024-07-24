<?php 
require_once 'dbcon.php'; 
require_once 'model.php';

if (isset($_POST['searchAUser'])) {
	$keyword = $_POST['keyword'];
	echo json_encode(searchAUser($conn, $keyword)); 
}

// $keyword = "da";
// $searchQuery = "%".$keyword."%";
// $funcTest = searchAUser($conn, $searchQuery);
// print_r($funcTest);

?>

