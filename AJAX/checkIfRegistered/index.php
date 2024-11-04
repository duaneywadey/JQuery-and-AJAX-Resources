<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 inputCol">
				<form class="searchForm" method="GET">
					<div class="form-group">
						<div class="danger text-danger mb-2 checkUserAlert"></div>
						<input type="text" name="checkUserInput" class="checkUserInput form-control">
					</div>
					<div class="form-group">
						<div class="danger text-danger mb-2 passwordAlert"></div>
						<input type="password" name="password" class="password form-control">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$('.checkUserInput').on('input', function (e) {
			e.preventDefault();
			var checkUserInput = $(this).val();
			if (checkUserInput != "") {
				$.ajax({
					type: "GET",
					url: "core/handleForms.php",
					data: {
						checkUserBtn:1,
						checkUserInput:checkUserInput
					},
					success: function (data) {
						$('.checkUserAlert').text(data);
					}
				})
			}
		})

		$('.password').on('input', function (e) {
			if ($(this).val().length < 8) {
				$('.passwordAlert').text("Password should not be less than 8 characters");
			}
			else {
				$('.passwordAlert').text("");
			}
		})
	</script>
</body>
</html>