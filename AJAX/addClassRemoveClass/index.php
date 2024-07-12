<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row mt-4">
			<div class="alert alert-primary d-none successAlert" role="alert">
			  A simple primary alert—check it out!
			</div>
			<div class="alert alert-danger d-none dangerAlert" role="alert">
				Oh no! Input Error!
			</div>
			<div class="col-md-6">
				<form action="#">
					<input type="text" class="form-control" id="sampleEntry" name="sampleEntry">
					<input type="submit" class="btn btn-primary" id="submitBtn" name="submitBtn">
				</form>
			</div>
			<div class="col-md-6">
				<form action="#">
					<input type="text" class="form-control" name="getInputTest" id="getInputTest">
				</form>
			</div>
			<div class="result"></div>
			<div class="getRequestTest"></div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#submitBtn').on('click', function (e) {
				e.preventDefault();
				var sampleEntry = $('#sampleEntry').val();
				$.ajax({
					url:'form.php',
					type:'POST',
					data:{sampleEntry:sampleEntry},
					dataType:'text',
					success: function (data) {
						if (data == 'success') {
							$('.dangerAlert').addClass('d-none');
							$('.successAlert').removeClass('d-none');
						}
						else {
							$('.successAlert').addClass('d-none');
							$('.dangerAlert').removeClass('d-none');
						}
					}
				})
			})

			$('#getInputTest').on('input', function (e) {
				e.preventDefault();
				var getInputTest = $('#getInputTest').val();
				$.ajax({
					url:'form.php',
					type:'GET',
					data:{getInputTest:getInputTest, getRequestTest:1},
					dataType:'text',
					success: function (data) {
						$(".getRequestTest").html(data);
					}
				})
			})
		});
	</script>
</body>
</html>