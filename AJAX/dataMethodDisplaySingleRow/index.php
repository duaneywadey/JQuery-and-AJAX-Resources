<?php require_once 'dbcon.php'; ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<style>
		.modal-body {
			height: 500px;
			overflow: scroll;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Post ID</th>
								<th scope="col">Title</th>
								<th scope="col">Date Added</th>
								<th scope="col">Action</th>
								<th scope="col">Comments</th>
							</tr>
						</thead>
						<tbody>
							<?php $showAllPosts = showAllPosts($conn); ?>
							<?php foreach ($showAllPosts as $post) { ?>
								<tr data-postid="<?php echo $post['post_id']; ?>">
									<td><?php echo $post['post_id']; ?></td>
									<td><?php echo $post['description']; ?></td>
									<td><?php echo $post['date_posted']; ?></td>
									<td>
										<button type="button" class="btn btn-primary modalBtn" data-toggle="modal" data-target="#exampleModal">
											Edit
										</button>
									</td>
									<td>
										<button type="button" class="btn btn-primary commentsModalBtn" data-toggle="modal" data-target="#commentsModal">
											Comments
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
					<form>
						<div class="form-group">
							<label for="date_posted">Date Posted</label>
							<input type="text" class="form-control status">
						</div>
						<div class="form-group">
							<label for="date_posted">Date Posted</label>
							<input type="text" class="form-control message">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control description">
						</div>
						<div class="form-group">
							<label for="date_posted">Date Posted</label>
							<input type="text" class="form-control date_posted">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Comments Modal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body commentsModalBody">
					<ul id="commentsList">
					</ul>
				</div>
				<div class="modal-footer">
					<div class="container">
						<div class="row">
							<div class="col">
								<form action="#">
									<input type="hidden" name="postID" class="postIdHere">
									<input type="text" name="commentDescription" id="commentDescription" class="form-control">
									<input type="submit" class="btn btn-primary float-right mt-2" id="submitCommentBtn">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>
		$('.modalBtn').on('click', function (e) {
			var postID = $(this).closest('tr').data("postid");
			$("#exampleModal").find('.postIdHere').val(postID);

			$.ajax({
				type:"POST",
				url: "dbcon.php",
				dataType: 'json',
				data: {
					getPost:1,
					postID:postID,
				},
				success : function (response) {
					console.log(response);
					$("#exampleModal").find('.status').val(response.status);
					$("#exampleModal").find('.message').val(response.message);
					$("#exampleModal").find('.description').val(response.description);
					$("#exampleModal").find('.date_posted').val(response.date_posted);
				}
			})

		});

		$('#submitCommentBtn').on('click', function (e) {
			e.preventDefault();
			var postID = $('.postIdHere').val();
			var commentDescription = $('#commentDescription').val();
			if(commentDescription != "") {
				$.ajax({
					type: "POST",
					url: "dbcon.php",
					dataType: "text",
					data: {
						submitCommentBtn:1,
						postID: postID,
						commentDescription:commentDescription,
					},
					success: function (response) {
						$('#commentsList').append("<li>" + commentDescription +"</li>");
					}
				})
			}
			else {
				alert("Should not be empty!");
			}
			
		});

		$('.commentsModalBtn').on('click', function (e) {
			var postID = $(this).closest('tr').data("postid");
			$("#commentsModal").find('.postIdHere').val(postID);

			$.ajax({
				type:"POST",
				url: "dbcon.php",
				dataType: "json",
				data: {
					getComments:1,
					postID:postID,
				},
				success: function (response) {
					$.each(response, function (key, value){
						$('#commentsList').append("<li>" + value.description +"</li>");
					})
				}
			})
		})

		$('#commentsModal').on("hide.bs.modal", function() {
			$('#commentsList').html('');
		})



	</script>

</body>
</html>

