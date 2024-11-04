<?php 

function checkIfUserAlreadyRegistered($pdo, $username) {
	$sql = "SELECT * FROM users WHERE username = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$username])) {

		if ($stmt->rowCount() == 0) {
			return false;
		}

		else {
			return true;
		}

	}
}


?>