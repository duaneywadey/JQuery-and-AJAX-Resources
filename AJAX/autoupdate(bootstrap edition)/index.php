<?php require_once 'dbcon.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<h1>Hello, world!</h1>
    			<table class="table" id="usersTable">
    				<thead>
    					<tr>
    						<th scope="col">ID</th>
    						<th scope="col">Description</th>
    						<th scope="col">Date Created</th>
    						<th scope="col">History</th>
    						<th scope="col">Edit</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $showAllPosts = showAllPosts($conn); ?>
    					<?php foreach ($showAllPosts as $row) { ?>
    						<tr value="<?php echo $row['post_id']; ?>">
    							<td><?php echo $row['post_id']; ?></td>
    							<td><?php echo $row['description']; ?></td>
    							<td><?php echo $row['date_posted']; ?></td>
    							<td><button class="btn btn-primary historyBtn" data-toggle="modal" value="<?php echo $row['post_id']; ?>" name="historyBtn" data-target="#historyModal">History</button></td>
    							<td><button onclick='reloadDIV();' class="btn btn-primary editBtn" name="editBtn" data-toggle="modal" value="<?php echo $row['post_id']; ?>" data-target="#exampleModal">Edit</button></td>
    						</tr>
    					<?php } ?>
    				</tbody>
    			</table>
    		</div>
    	</div>

    	<!-- Modal -->
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: scroll;">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<div class="modal-body">
    					<form action="#" method="POST">
    						<input type="hidden" id="post_id" name="post_id" class="form-control">
    						<div class="form-group">
    							<label for="#">Description</label>
    							<input type="text" id="description" name="description" class="form-control">
    						</div>
    						<div class="form-group">
    							<label for="#">Date Added</label>
    							<input type="text" name="date_added" id="date_posted" class="form-control" disabled>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    			<div class="modal-dialog" role="document">
    				<div class="modal-content">
    					<div class="modal-header">
    						<h5 class="modal-title" id="exampleModalLabel">History</h5>
    						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
    						</button>
    					</div>
    					<div class="modal-body" style="overflow: scroll; height: 500px;">
    						<div class="card">
    							<div class="card-body">
    								<table class="table" id="logsTable">
    									<thead>
    										<tr>
    											<th scope="col">Description</th>
    											<th scope="col">Date Created</th>
    										</tr>
    									</thead>
    									<tbody id="activityLogsTable">
    									</tbody>
    								</table>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    		<script>
    			$(document).ready(function () {

    				$('.editBtn').on("click", function (e) {
    					e.preventDefault();
    					var post_id = $(this).val();
    					var editPost = true;

    					$.ajax({
    						type: "GET",
    						url: "dbcon.php?post_id=" + post_id + "&editPost=" + editPost,
    						dataType: 'json',

    						success: function (res) { 
    							console.log(res);
    							$('#post_id').val(res.showPostByID.post_id);
    							$('#description').val(res.showPostByID.description);
    							$('#date_posted').val(res.showPostByID.date_posted);
    						}
    					})
    				})

    				$('.historyBtn').on("click", function (e) {
    					e.preventDefault();
    					var post_id = $(this).val();
    					var showHistory = true;

    					$("#historyModal").val(null).trigger("change");


    					$.ajax({
    						type: "GET",
    						url: "dbcon.php?post_id=" + post_id + "&showHistory=" + showHistory,
    						dataType: "json",

    						success: function (res) {
    							console.log(res);
    							res.forEach(function (data) {
    								$('#activityLogsTable').append('<tr><td>' + data.description + '</td>' +'<td>' + data.date_created +'</td>'+ '</tr>');
    							});
    						}
    					})
    				})

    				$('#description').on("input", function (e) {
    					e.preventDefault();
    					var post_id = $('#post_id').val();
    					var description = $('#description').val();

    					if(description!="") {
    						$.ajax({
    							url:"dbcon.php",
    							method:"POST",
    							data: {
    								description:description,
    								post_id:post_id
    							},
    							dataType:"text",
    							success: function (data) {
    								console.log(data);
    								$("#usersTable").load(location.href + " #usersTable");
							}
						})
    					}
    					else {
    						alert("Make sure the fields are complete!");
    					}

    				})
    				$('#historyModal').on('hidden.bs.modal', function (e) {
						  location.reload();
						});

    			})
    		</script>

    	</body>
    	</html>