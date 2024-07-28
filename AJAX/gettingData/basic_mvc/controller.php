<?php 
require_once 'dbcon.php'; 
require_once 'model.php';

if (isset($_POST['searchAUser'])) {
	$keyword = $_POST['keyword'];
	$allRecordsFromSearch = searchAUser($conn, $keyword);
	
	echo "
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
			</tr>
			
			";

	foreach ($allRecordsFromSearch as $value) {
		echo "
			<tr>	
			<td>{$value['id']}</td>
			<td>{$value['first_name']}</td>
			<td>{$value['last_name']}</td>
			<td>{$value['email']}</td>
			<td>{$value['gender']}</td>
			</tr>
			";
	 } 
}

// $keyword = "da";
// $searchQuery = "%".$keyword."%";
// $funcTest = searchAUser($conn, $searchQuery);
// print_r($funcTest);

?>

