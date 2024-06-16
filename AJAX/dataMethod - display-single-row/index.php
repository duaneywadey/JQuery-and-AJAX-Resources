<?php require_once 'dbcon.php'; ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Hello, world!</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Date Added</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $showAllPosts = showAllPosts($conn); ?>
							<?php foreach ($showAllPosts as $post) { ?>
								<tr data-id="<?php echo $post['post_id']; ?>">
									<td><?php echo $post['description']; ?></td>
									<td><?php echo $post['date_posted']; ?></td>
									<td>
										<button type="button" class="btn btn-primary modalBtn">
											View
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#">
						<input type="text">
						<input type="text">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('.modalBtn').on('click', function (e) {
			var postID = $(this).closest('tr').data('id');
			console.log(postID);
		});

	</script>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>