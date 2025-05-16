<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Lightbox Example</title>
	<?php include 'includes/header.php'; ?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card shadow mt-4">
					<div class="card-header">
						<h2>Submit a Photo Here!</h2>
					</div>
					<div class="card-body">
						<form id="submitPhoto">
							<div class="form-group">
								<label for="exampleInputEmail1">Photo</label>
								<input type="file" class="form-control photoName" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Select Category</label>
								<select name="#" id="" class="form-control">
									<option value="#">None</option>
									<option value="#">None</option>
									<option value="#">None</option>
									<option value="#">None</option>
								</select>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary mt-4 float-right">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
	</script>
</body>
</html>
