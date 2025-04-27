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

		$('#insertNewUser').on('submit', function (event) {
			console.log($(this));
			event.preventDefault();
			var formData = {
		      first_name: $("#firstNameInput").val(),
		      last_name: $("#lastNameInput").val(),
		      email: $("#emailInput").val(),
		      gender: $("#genderInput").val(),
		      insertNewUser:1
		    };

		    if (formData.first_name != "" && formData.last_name != "" 
	          && formData.email != "" && formData.gender != "") {
	          $.ajax({
	            type: "POST",
	            url: "controller.php",
	            data: formData,
	            success: function (data) {   
	            	location.reload();
	            	console.log($(this));
	            }
	          })
	        }
		})

		$('#inputFieldNameSearch').on('input', function (event) {
			$.ajax({
				method: "POST",
				url: "controller.php",
				data: {
					searchAUser:1,
					keyword:$('#inputFieldNameSearch').val()
				},
				success: function (data) {
					if ($('#inputFieldNameSearch').val() != "" && data != "") {
						$('#loadData').html(data);
					}

					else {
						$('#loadData').html("<h2>No results found</h2>");
					}
				}
			})
		
		})
	</script>
</body>
</html>