<?php  

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['editUserBtn'])) {
	$editUser = editUser($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['state'], $_POST['nationality'], $_POST['car_brand'], $_GET['id']);

	if ($editUser) {
		header("Location: ../index.php");
	}
}

if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo,$_GET['id']);

	if ($deleteUser) {
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);

	echo "
			<tr>
			 <th>ID</th>
			 <th>First Name</th>
			 <th>Last Name</th>
			 <th>Email</th>
			 <th>Gender</th>
			 <th>Address</th>
			 <th>State</th>
			 <th>Nationality</th>
			 <th>Car Brand</th>
			 <th>Action</th>
			</tr>
		  ";

	foreach ($searchForAUser as $row) {
	    echo "
	    	 <tr>
		    	  <td>{$row['id']}</td>
		          <td>{$row['first_name']}</td>
		          <td>{$row['last_name']}</td>
		          <td>{$row['email']}</td>
		          <td>{$row['gender']}</td>
		          <td>{$row['address']}</td>
		          <td>{$row['state']}</td>
		          <td>{$row['nationality']}</td>
		          <td>{$row['car_brand']}</td>
		          <td>
		              <a href='edit.php?id={$row['id']}'>Edit</a>
		              <a href='delete.php?id={$row['id']}'>Delete</a>
		          </td>
	          </tr>
	    ";
	}
}

?>