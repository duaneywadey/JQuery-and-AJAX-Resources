<?php  
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewUserBtn'])) {
	$username = trim($_POST['username']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($confirm_password)) {

		if ($password == $confirm_password) {

			$insertQuery = insertNewUser($pdo, $username, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT));
			$_SESSION['message'] = $insertQuery['message'];

			if ($insertQuery['status'] == '200') {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginUserBtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = checkIfUserExists($pdo, $username);
		$userIDFromDB = $loginQuery['userInfoArray']['user_id'];
		$usernameFromDB = $loginQuery['userInfoArray']['username'];
		$passwordFromDB = $loginQuery['userInfoArray']['password'];
		$isAdminStatusFromDB = $loginQuery['userInfoArray']['is_admin'];

		if (password_verify($password, $passwordFromDB)) {
			$_SESSION['user_id'] = $userIDFromDB;
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['is_admin'] = $isAdminStatusFromDB;
			header("Location: ../index.php");
		}

		else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../login.php");
	}

}

if (isset($_GET['logoutUserBtn'])) {
	unset($_SESSION['username']);
	unset($_SESSION['user_id']);
	unset($_SESSION['is_admin']);
	header("Location: ../index.php");
}


if (isset($_POST['insertCategoryBtn'])) {
	$category_name = ucfirst($_POST['category_name']);
	$user_id = $_SESSION['user_id'];
	if (insertNewCategory($pdo, $category_name, $user_id)) {
		header("Location: ../categories.php");
	}
}


if (isset($_POST['insertImageFileBtn'])) {

	// Allowed file types	
	$allowed_file_types = ['jpg', 'jpeg', 'png'];

	// Get file name
	$fileName = $_FILES['image']['name'];

	// Get temporary file name
	$tempFileName = $_FILES['image']['tmp_name'];

	// Get photo description from form
	$photoDescription = $_POST['photoDescription'];

	// Get category name from form
	$category_name = $_POST['category_name'];

	// Get file extension
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

	// Generate random characters for image name
	$uniqueID = sha1(md5(rand(1,9999999)));

	// Combine image name and file extension
	$imageName = $uniqueID.".".$fileExtension;

	// Specify path
	$folder = "../files/".$imageName;

	// Move file to the specified path 
	if (in_array($fileExtension, $allowed_file_types)) {
		if (!checkIfUserSuspended($pdo, $_SESSION['user_id'])) {
			if (move_uploaded_file($tempFileName, $folder)) {
				if (insertPhoto($pdo, $imageName, $photoDescription, $_SESSION['user_id'], $category_name)) {
					$_SESSION['message'] = "File saved successfully!";
					$_SESSION['status'] = "200";
					header("Location: ../index.php");
				}
			}
		}
		else {
			$_SESSION['message'] = "Account is suspended!";
			$_SESSION['status'] = "404";
			header("Location: ../submit_a_photo.php");
		}
	}
	else {
		$_SESSION['message'] = "Only image files are allowed!";
		$_SESSION['status'] = "404";
		header("Location: ../submit_a_photo.php");
	}

	
}

if (isset($_POST['deletePhoto'])) {
	$unsplash_photo_id = $_POST['unsplash_photo_id'];
	$photo_name = $_POST['photo_name'];
	echo deletePhoto($pdo, $unsplash_photo_id, $photo_name);
}
if (isset($_POST['deleteCategory'])) {
	$unsplash_category_id = $_POST['unsplash_category_id'];
	echo deleteCategory($pdo, $unsplash_category_id);
}

if (isset($_POST['suspendOrUnspendUser'])) {
	$suspend_or_unsuspend = $_POST['suspend_or_unsuspend'];
	$user_id = $_POST['user_id'];
	echo suspendOrUnspendUser($pdo, $suspend_or_unsuspend, $user_id);
}

if (isset($_POST['showImagesByCategory'])) {

    $category_name = $_POST['category_name'];

    $getAllPhotos = getAllPhotos($pdo, $category_name);

    if (!empty($getAllPhotos)) {
        foreach ($getAllPhotos as $row) {
            echo '<div class="col-4 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <a class="example-image-link" 
                            	href="files/'. $row['photo_name'] . '" 
                            	data-lightbox="example-set" 
                            	data-title="' . $row['photo_description'] . '">

                            	<img class="example-image img-fluid" 
                            		 src="files/' . $row['photo_name'] . '" 
                            		 alt="' . $row['photo_description'] . '" /></a>
                            
                            
	                            <h5>' . $row["photo_description"] . '</h5>
	                            <h6>' . $row["username"] . '</h6>
	                            <h6>' . $row["category_name"] . '</h6>
	                            <p><i>' . $row["date_added"] . '</i></p>
	                        </div>
	                    </div>
	                </div>';
        }
    } else {
        echo '<p>No images found in the category: ' . $category_name . '</p>';
    }
}
?>
