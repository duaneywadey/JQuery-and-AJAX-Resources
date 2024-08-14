<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php include 'includes/header.php'; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<ul>
				<li><a href="all-posts.php">All Posts</a></li>
				<li><a href="limit-posts.php">Limit Posts</a></li>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Post Visibility</th>
								</tr>
							</thead>
							<tbody>
								<?php $selectAllNamesWithPosts = selectAllNamesWithPosts($pdo); ?>
								<?php foreach ($selectAllNamesWithPosts as $row) { ?>
								<tr data-userid=<?php echo $row['user_id'];?>>
									<td><?php echo $row['fullName']; ?></td>
									<td>
										<?php $checkIfAllPostsAreVisible = checkIfAllPostsAreVisible($pdo, $row['user_id']); ?>
										<?php if ($checkIfAllPostsAreVisible) { ?>
											<div class="form-check">
												<input type="checkbox" class="form-check-input single-checkbox" id="exampleCheck1" checked>
											</div>
										<?php } else { ?>
											<div class="form-check">
												<input type="checkbox" class="form-check-input single-checkbox" id="exampleCheck1">
											</div>
										<?php } ?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
		$(".single-checkbox").on('change', function (e) {
			var userid = $(this).closest('tr').data('userid');
			if (!$(this).is(':checked')) {
				$.ajax({
					url: 'controllers.php',
					method: 'POST',
					data: {
						hideAllPostsFromUser:1,
						userid: userid
					},
					success: function (data) {
						location.reload();
					}
				})
			}
			else {
				$.ajax({
					url: 'controllers.php',
					method: 'POST',
					data: {
						unhideAllPostsFromUser:1,
						userid: userid
					},
					success: function (data) {
						location.reload();
					}
				})
			}
		});
	</script>
</body>
</html>