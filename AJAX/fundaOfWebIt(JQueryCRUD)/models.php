<?php  

function seeAllRecords($pdo) {
	$sql = "SELECT * FROM mock_data 
			ORDER BY date_added DESC 
			LIMIT 100";
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


function getAllNamesAndPosts($pdo) {
	$sql = "SELECT 
				CONCAT(mock_data.first_name, mock_data.last_name) AS fullName,
				mock_data_user_posts.post_description AS postDescription
			FROM mock_data
			JOIN mock_data_user_posts ON mock_data.id = mock_data_user_posts.user_id
			WHERE mock_data_user_posts.is_accepted = 1
			ORDER BY fullName ASC
			";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function selectAllNamesWithPosts($pdo) {
    $sql = "SELECT 
				DISTINCT CONCAT(mock_data.first_name, mock_data.last_name) AS fullName,
				mock_data_user_posts.user_id AS user_id
			FROM mock_data
			JOIN mock_data_user_posts ON mock_data.id = mock_data_user_posts.user_id
			ORDER BY fullName ASC
    		";
    $stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function checkIfAllPostsAreVisible($pdo, $user_id) {
	$sql = "SELECT * FROM mock_data_user_posts 
			WHERE user_id = ? AND is_accepted = 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$user_id]);

	if ($stmt->rowCount() > 0) {
		return true;
	}
	else {
		return false;
	}
}


function hideAllPostsFromUser($pdo, $user_id) {
	$sql = "UPDATE 
				mock_data_user_posts 
			SET is_accepted = 0 WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$user_id]);
}

function unhideAllPostsFromUser($pdo, $user_id) {
	$sql = "UPDATE 
				mock_data_user_posts 
			SET is_accepted = 1 WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$user_id]);
}

?>