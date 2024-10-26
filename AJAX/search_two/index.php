<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-info" role="alert">
						<?php echo $_SESSION['message']; ?>
					</div>
				<?php } unset($_SESSION['message']); ?>

				<form class="searchForm" method="GET">
					<input type="text" name="searchInput" class="searchInput">
					<input type="submit" name="searchBtn" value="Search" class="searchBtn">
					<a href="index.php">Clear Search Query</a>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card shadow p-3 mb-5 bg-white rounded mt-4">
					<div class="card-body">
						<table style="width:100%; margin-top: 20px;" class="table table-bordered allRows">
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
							<?php
								$getAllUsers = getAllUsers($pdo);
								foreach ($getAllUsers as $row) { 
							?>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['first_name']; ?></td>
										<td><?php echo $row['last_name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['gender']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['state']; ?></td>
										<td><?php echo $row['nationality']; ?></td>
										<td><?php echo $row['car_brand']; ?></td>
										<td>
											<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
											<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
										</td>
									</tr>
							<?php } ?> 
						</table>
						<table class="table table-bordered searchRows" style="width:100%; margin-top: 20px;">
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('form').on('input', function (e) {
			e.preventDefault();
			var searchInput = $('.searchInput').val();
			$.ajax({
				type: "GET",
				url: "core/handleForms.php",
				data: {
					searchBtn:1,
					searchInput:searchInput
				},
				success: function (data) {
					$('.allRows').hide();
					$('.searchRows').html(data);
				}
			})
		})
	</script>
</body>
</html>