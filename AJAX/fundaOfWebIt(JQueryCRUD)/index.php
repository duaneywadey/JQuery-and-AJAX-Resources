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
	<div class="container-fluid">
		<ul>
			<li><a href="all-posts.php">All Posts</a></li>
			<li><a href="limit-posts.php">Limit Posts</a></li>
			<li><a href="index.php">Home</a></li>
		</ul>
		<div class="row justify-content-center">
			<button class="btn btn-primary mt-4 mb-4 addNewUserBtn">Add New <i class="fa fa-plus" aria-hidden="true"></i></button>
			<div class="col-md-12">
				<table class="table" id="recordsTbl">
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>IP Address</th>
						<th>Quote</th>
						<th>Date Added</th>
						<th>View</th>
						<th>Edit</th>
					</tr>
					<?php $seeAllRecords = seeAllRecords($pdo); ?>
					<?php foreach ($seeAllRecords as $row) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['gender']; ?></td>
							<td><?php echo $row['ip_address']; ?></td>
							<td><?php echo $row['quote']; ?></td>
							<td><?php echo $row['date_added']; ?></td>
							<td>
								<button class="btn btn-primary viewUserBtn" value="<?php echo $row['id']; ?>">
									View
								</button>
							</td>
							<td>
								<button class="btn btn-success editUserBtn" value="<?php echo $row['id']; ?>">
									Edit
								</button>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

	<!-- Add New User Modal -->
	<div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="controllers.php" method="POST">
	      		<div class="row">
	      			<div class="col-md-6">
	      				<div class="form-group">
	      					<label for="id">First Name</label>
	      					<input type="text" class="form-control first_name" name="first_name">
	      				</div>
	      			</div>
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Last Name</label>
			      			<input type="text" class="form-control last_name" name="last_name">
			      		</div>
	      			</div>
	      		</div>
	      		<div class="row">
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Email</label>
			      			<input type="text" class="form-control email" name="email">
			      		</div>	
	      			</div>
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Gender</label>
			      			<input type="text" class="form-control gender" name="gender">
			      		</div>	
	      			</div>
	      		</div>
	      		<div class="form-group">
	      			<label for="id">IP Address</label>
	      			<input type="text" class="form-control ipaddress" name="ipaddress">
	      		</div>
	      		<div class="form-group">
	      			<label for="id">Quote</label>
	      			<input type="text" class="form-control quote" name="quote">
	      		</div>
	      		<div class="form-group">
	      			<input type="submit" class="btn btn-primary float-right" value="Save" name="addNewUserBtn">
	      		</div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- View User Modal -->
	<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	      		<div class="row">
	      			<div class="col-md-2">
	      				<div class="form-group">
	      					<label for="id">ID</label>
	      					<input type="text" class="form-control user_id" disabled>
	      				</div>
	      			</div>
	      			<div class="col-md-5">
	      				<div class="form-group">
	      					<label for="id">First Name</label>
	      					<input type="text" class="form-control first_name" disabled>
	      				</div>
	      			</div>
	      			<div class="col-md-5">
	      				<div class="form-group">
			      			<label for="id">Last Name</label>
			      			<input type="text" class="form-control last_name" disabled>
			      		</div>
	      			</div>
	      		</div>
	      		<div class="row">
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Email</label>
			      			<input type="text" class="form-control email" disabled>
			      		</div>	
	      			</div>
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Gender</label>
			      			<input type="text" class="form-control gender" disabled>
			      		</div>	
	      			</div>
	      		</div>
	      		<div class="form-group">
	      			<label for="id">IP Address</label>
	      			<input type="text" class="form-control ipaddress" disabled>
	      		</div>
	      		<div class="form-group">
	      			<label for="id">Quote</label>
	      			<input type="text" class="form-control quote" disabled>
	      		</div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

		<!-- Edit User Modal -->
	<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="controllers.php" method="POST">
	      		<div class="row">
	      			<div class="col-md-6">
	      				<div class="form-group">
	      					<label for="id">First Name</label>
	      					<input type="hidden" class="form-control user_id" name="user_id" disabled>
	      					<input type="text" class="form-control first_name" name="first_name">
	      				</div>
	      			</div>
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Last Name</label>
			      			<input type="text" class="form-control last_name" name="last_name">
			      		</div>
	      			</div>
	      		</div>
	      		<div class="row">
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Email</label>
			      			<input type="text" class="form-control email" name="email">
			      		</div>	
	      			</div>
	      			<div class="col-md-6">
	      				<div class="form-group">
			      			<label for="id">Gender</label>
			      			<input type="text" class="form-control gender" name="gender">
			      		</div>	
	      			</div>
	      		</div>
	      		<div class="form-group">
	      			<label for="id">IP Address</label>
	      			<input type="text" class="form-control ipaddress" name="ipaddress">
	      		</div>
	      		<div class="form-group">
	      			<label for="id">Quote</label>
	      			<input type="text" class="form-control quote" name="quote">
	      		</div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<?php include 'includes/footer.php'; ?>
	<script>

		$('.addNewUserBtn').on('click', function (e) {
			$('#addNewUserModal').modal('show');
		});

		$('.modal').on('hidden.bs.modal', function (e) {
			location.reload();
		})

		$('.viewUserBtn').on('click', function (e) {
			var user_id = $(this).val();
			$.ajax({
				type:"POST",
				dataType:'json',
				url:"controllers.php?user_id=" + user_id,
				data: {getUserById:1},
				success: function (response) {
					$('#viewUserModal').find('.user_id').val(response.id);
					$('#viewUserModal').find('.first_name').val(response.first_name);
					$('#viewUserModal').find('.last_name').val(response.last_name);
					$('#viewUserModal').find('.email').val(response.email);
					$('#viewUserModal').find('.gender').val(response.gender);
					$('#viewUserModal').find('.ipaddress').val(response.ip_address);
					$('#viewUserModal').find('.quote').val(response.quote);
					$('#viewUserModal').modal('show');
				}
			})
		})

		$('.editUserBtn').on('click', function (e) {
			var user_id = $(this).val();
			$.ajax({
				type:"POST",
				dataType:'json',
				url:"controllers.php?user_id=" + user_id,
				data: {
					getUserById:1
				},
				success: function (response) {
					$('#editUserModal').find('.user_id').val(response.id);
					$('#editUserModal').find('.first_name').val(response.first_name);
					$('#editUserModal').find('.last_name').val(response.last_name);
					$('#editUserModal').find('.email').val(response.email);
					$('#editUserModal').find('.gender').val(response.gender);
					$('#editUserModal').find('.ipaddress').val(response.ip_address);
					$('#editUserModal').find('.quote').val(response.quote);
					$('#editUserModal').modal('show');
				}
			})
		})

		$('.first_name, .last_name, .email, .gender, .ipaddress, .quote').on('input', function (e) {
			var user_id = $('#editUserModal').find('.user_id').val();
			var first_name = $('#editUserModal').find('.first_name').val();
			var last_name = $('#editUserModal').find('.last_name').val();
			var email = $('#editUserModal').find('.email').val();
			var gender = $('#editUserModal').find('.gender').val();
			var ipaddress = $('#editUserModal').find('.ipaddress').val();
			var quote = $('#editUserModal').find('.quote').val();

			if (first_name != "" && last_name != "" && email != "" && gender != "" && ipaddress != "" && quote !="") {

				$.ajax({
					type: "POST",
					url: "controllers.php",
					data: {
						editAUser:1,
						user_id: user_id,
						first_name: first_name,
						last_name: last_name,
						email: email,
						gender: gender,
						ipaddress: ipaddress,
						quote: quote
					},
					success: function (response) {
						console.log(location.href);
						$(".table").load(location.href + " .table");
					}
				})

			}
			else {
				alert("A field should not be empty");
			}
		})
		
	</script>
</body>
</html>