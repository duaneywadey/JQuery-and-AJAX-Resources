<?php  

require_once 'dbConfig.php';


// User entity

function checkIfUserExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM unsplash_users WHERE username = ?";
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

		$sql = "INSERT INTO unsplash_users (username, first_name, last_name, is_admin, password) 
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
	$sql = "SELECT * FROM unsplash_users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function insertNewCategory($pdo, $category_name, $user_id) {
	$sql = "INSERT INTO unsplash_categories (category_name, user_id) VALUES (?,?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$category_name, $user_id]);
}

function deleteCategory($pdo, $unsplash_category_id) {
	$sql = "DELETE FROM unsplash_categories WHERE unsplash_category_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$unsplash_category_id]);
}

function getAllCategories($pdo) {
	$sql = "SELECT 
				unsplash_categories.unsplash_category_id AS unsplash_category_id, 
				unsplash_categories.category_name AS category_name, 
				unsplash_categories.date_added AS date_added, 
				unsplash_users.username AS username
			FROM unsplash_categories
			JOIN unsplash_users ON 
				unsplash_categories.user_id = unsplash_users.user_id
			ORDER BY unsplash_categories.date_added DESC
			";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function insertPhoto($pdo, $photo_name, $photo_description, $user_id, $category_name) {
	$sql = "INSERT INTO unsplash_photos (photo_name, photo_description, user_id, category_name) 
			VALUES(?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$photo_name, $photo_description, $user_id, $category_name]);
}

function deletePhoto($pdo, $unsplash_photo_id, $photo_name) {
	$sql = "DELETE FROM unsplash_photos WHERE unsplash_photo_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$unsplash_photo_id])) {
		unlink("../files/" . $photo_name);
		return true;
	}
	
}

function getAllPhotos($pdo, $category_name="") {

	if ($category_name != "") {
		$sql = "SELECT 
					unsplash_photos.user_id, 
					unsplash_photos.unsplash_photo_id, 
					unsplash_photos.photo_name, 
					unsplash_photos.photo_description, 
					unsplash_photos.date_added, 
					unsplash_photos.category_name, 
					unsplash_users.username
				FROM unsplash_photos
				JOIN unsplash_users ON 
					unsplash_photos.user_id = unsplash_users.user_id
				WHERE unsplash_photos.category_name = ?
				ORDER BY unsplash_photos.date_added DESC
				";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$category_name]);
	}

	else {
		$sql = "SELECT 
					unsplash_photos.user_id, 
					unsplash_photos.unsplash_photo_id, 
					unsplash_photos.photo_name, 
					unsplash_photos.photo_description, 
					unsplash_photos.category_name, 
					unsplash_photos.date_added, 
					unsplash_users.username
				FROM unsplash_photos
				JOIN unsplash_users ON 
					unsplash_photos.user_id = unsplash_users.user_id
				ORDER BY unsplash_photos.date_added DESC
				";
			$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}
	return $stmt->fetchAll();
}


function suspendOrUnspendUser($pdo, $suspend_or_unsuspend, $user_id) {
	if ($suspend_or_unsuspend == "Suspend") {
		$sql = "UPDATE unsplash_users SET is_suspended = '1'
				WHERE user_id = ?
				";
	}
	if ($suspend_or_unsuspend == "Unsuspend") {
		$sql = "UPDATE unsplash_users SET is_suspended = '0'
				WHERE user_id = ?
				";
	}
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$user_id]);
}

function checkIfUserSuspended($pdo, $user_id) {
	$sql = "SELECT user_id FROM unsplash_users 
			WHERE is_suspended = '1' AND user_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$user_id]);
	if ($stmt->rowCount() > 0) {
		return true;
	}
}