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
						<h1 class="display-4 text-center">
					      <?php  
					      if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

					        if ($_SESSION['status'] == "200") {
					          echo "<span class='text-success'>{$_SESSION['message']}</span>";
					        }

					        else {
					          echo "<span class='text-danger'>{$_SESSION['message']}</span>"; 
					        }

					      }
					      unset($_SESSION['message']);
					      unset($_SESSION['status']);
					    ?>
					    </h1>

						<?php if (isset($_SESSION['username'])) { ?>
						<form action="core/handleForms.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputEmail1">Photo</label>
								<input type="file" class="form-control" name="image" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Description</label>
								<input type="text" class="form-control" name="photoDescription" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Select Category</label>
								<select name="category_name" id="" class="form-control">
									<?php $getAllCategories = getAllCategories($pdo); ?>
									<?php foreach ($getAllCategories as $row) {?>
										<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary mt-4 float-right" name="insertImageFileBtn">
							</div>
						</form>
						<?php } else { ?>
							<p>Please login <a href="login.php"> here</a> first before submitting a photo.</p>
						<?php } ?>
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
