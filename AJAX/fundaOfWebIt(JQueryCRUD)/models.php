<?php  

function seeAllRecords($pdo) {
	$sql = "SELECT * FROM mock_data 
			ORDER BY date_added DESC 
			LIMIT 10";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM mock_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$user_id]);
	return $stmt->fetch();
}

function insertNewUser($pdo, $first_name, $last_name, $email, $gender, $ip_address, $quote) {
	$sql = "INSERT INTO mock_data (first_name, last_name, email, gender, ip_address, quote) VALUES(?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$first_name, $last_name, $email, $gender, $ip_address, $quote]);
}

function editAUser($pdo, $first_name, $last_name, $email, $gender, $ip_address, $quote, $user_id) {
	$sql = "UPDATE mock_data SET first_name = ?, last_name = ?, email = ?, gender = ?, ip_address = ?, quote = ? WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$first_name, $last_name, $email, $gender, $ip_address, $quote, $user_id]);
}

?>