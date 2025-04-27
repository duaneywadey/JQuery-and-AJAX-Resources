<?php require_once 'model.php'; ?>
<?php require_once 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		#allUsers {
			margin-top: 25px;
			display: flex;
		}
		input {
			margin-top: 25px;
			font-size: 1.5em;
			padding: 25px;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
	<div id="allUsers">	
	<!-- Get the five recently added users -->
	<?php $getRecentUsers = getRecentUsers($pdo); ?>
	<?php foreach ($getRecentUsers as $row) { ?>
		<div class="container" style="border: 1px solid black; padding: 25px; margin-left: 25px;">
			<h1><?php echo $row['last_name'] . " , " . $row['first_name'] ?></h1>
			<h2><?php echo $row['email'] ?></h2>
			<h4><?php echo $row['gender'] ?></h4>
		</div>
	<?php } ?>
	</div>
	<form action="controller.php" id="insertNewUser">
		<label for="inputField">First Name</label><input type="text" id="firstNameInput">
		<label for="inputField">Last Name</label>
		<input type="text" id="lastNameInput">
			<label for="inputField">Email</label>
		<input type="text" id="emailInput">
		<p>
			<label for="inputField">Gender</label>
			<input type="text" id="genderInput">
			<input type="submit">
		</p>
	</form>
	<label for="inputField">Search here by name</label>
	<input type="text" id="inputFieldNameSearch">
	<div id="loadData">
		<h2>Search results will be displayed here</h2>
	</div>
	<script>

		// If submit event is detected on the #insertNewUser, 
		// which is a form, execute the following
		$('#insertNewUser').on('submit', function (event) {

			// To prevent entire page from reloading
			event.preventDefault();

			// Store the input field values inside 
			// an object (key-value pairs variable)
			var formData = {
		      first_name: $("#firstNameInput").val(),
		      last_name: $("#lastNameInput").val(),
		      email: $("#emailInput").val(),
		      gender: $("#genderInput").val(),

		      // So the PHP script recognizes our AJAX request
		      insertNewUser:1
		    };

		    // Making sure no input fields are empty
		    if (formData.first_name != "" && formData.last_name != "" 
	          && formData.email != "" && formData.gender != "") {
	          $.ajax({

	          	// We specify that it's a POST request 
	            type: "POST",

	            // File name to send our AJAX request to
	            url: "controller.php",

	            // Specify the object to be sent
	            data: formData,

	            // If the server returns true, execute the code
	            // inside the success function
	            success: function (data) {   
	            	location.reload();
	            }
	          })
	        }
		})

		// If input event is detected on the #inputFieldNameSearch
		// element, execute the code below
		$('#inputFieldNameSearch').on('input', function (event) {

			$.ajax({

				// Specifying that we are sending 
				// a POST request to the server
				method: "POST",

				// File/link to send our AJAX request to
				url: "controller.php",

				// We listed the key-value pairs our 
				// PHP script should expect
				data: {
					searchAUser:1,
					keyword:$('#inputFieldNameSearch').val()
				},

				success: function (data) {

					// If our input field is not empty, and the server's response is not empty as well, we load the response from the server inside #loadData element
					if ($('#inputFieldNameSearch').val() != "" && data != "") {
						$('#loadData').html(data);
					}

					// If result is empty, it means no results were found
					else {
						$('#loadData').html("<h2>No results found</h2>");
					}
				}
			})
		})
	</script>
</body>
</html>