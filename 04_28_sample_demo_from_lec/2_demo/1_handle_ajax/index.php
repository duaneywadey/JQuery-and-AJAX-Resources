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
	<div class="successLabel d-none"></div>
	<form id="testForm">
		<p><label for="inputField">First Name</label><input type="text" id="firstNameInput"></p>
		<p><label for="inputField">Last Name</label>
		<input type="text" id="lastNameInput"></p>
		<p><label for="inputField">Gender</label>
		<input type="text" id="genderInput"></p>
		<input type="submit">
	</form>
	<script>
		$('#testForm').on('submit', function (event) {
			event.preventDefault();

			var formData = {
				first_name: $('#firstNameInput').val(),
				last_name: $('#lastNameInput').val(),
				gender: $('#genderInput').val(),
				testAjaxRequest: 1
			};

			if (formData.first_name != "" && formData.last_name != "" && formData.gender != "") {
				$.ajax({
					type:"POST",
					url: "handle_ajax_request.php",
					data: formData,
					success: function (data) {
						$('.successLabel').removeClass('d-none').hide().fadeIn();
						$('.successLabel').html("<h1>" + data +"</h1>");
					} 
				})
			}
		})
	</script>
</body>
</html>