<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.d-none {
			display: none;
		}
		.successLabel {
			background-color: #98FBCB; 
			border-style: solid; 
			padding: 25px;
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
	<form id="testForm">
		<p><label for="inputField">First Name</label><input type="text" id="firstNameInput"></p>
		<p><label for="inputField">Last Name</label>
		<input type="text" id="lastNameInput"></p>
		<p><label for="inputField">Gender</label>
		<input type="text" id="genderInput"></p>
		<input type="submit">
	</form>
	<div class="successLabel d-none"></div>
	<script>

		// If submit event has been detected on the form,
		// we execute the given block of code below
		$('#testForm').on('submit', function (event) {

			// To prevent the page from reloading
			event.preventDefault();

			// Store inside a JSON variable our
			// input field values
			var formData = {
		      first_name: $("#firstNameInput").val(),
		      last_name: $("#lastNameInput").val(),
		      gender: $("#genderInput").val(),

		      // This key is for us to label this
		      // event inside the PHP script  
		      testAjaxRequest:1
		    };

		    // Making sure all our inputs are not empty
		    if (formData.first_name != "" && formData.last_name != "" && formData.gender != "") {

		      // We call the AJAX method to perform AJAX requests
	          $.ajax({

	          	// We specify that it's a POST request for security
	            type: "POST",

	            // We send the request to this PHP file
	            url: "7_handle_ajax_request.php",

	            // We assign formData to the data parameter of this 
	            // function so the PHP script recognizes our input
	            data: formData,

				// We expect a JSON data to be returned. 
				// It's text/string by default	            
	            dataType:"json",

	            // If the AJAX request is successfull
	            success: function (data) {   

	            	// We show the success label and add a fadeIn effect when showing it
	            	$('.successLabel').removeClass('d-none').hide().fadeIn();

	            	// We get the values inside the JSON data returned (JSON)
	            	$('.successLabel').html("<h1>"+ data.greeting + ", "+ data.first_name + " " + data.last_name + "</h1><h3>" + data.message +"</h3>");

	            	// If we want to return the result in text format
	            	// $('.successLabel').html("<h1>" + data +"</h1>");

	            }
	          })
	        }
		})
	</script>
</body>
</html>