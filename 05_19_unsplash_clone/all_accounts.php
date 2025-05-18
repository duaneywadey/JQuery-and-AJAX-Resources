<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Lightbox Example</title>
  <?php include 'includes/header.php'; ?>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
    <div class="container-fluid">
    	<div class="row justify-content-center">
    		<div class="col-md-12">
    			<div class="card shadow mt-4 p-4">
    				<div class="card-header"><h2>All Accounts</h2></div>
    				<div class="card-body">
    					<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Username</th>
						      <th scope="col">FirstName</th>
						      <th scope="col">LastName</th>
						      <th scope="col">Date Registered</th>
						      <th scope="col">Admin Staus</th>
						      <th scope="col">Account Status</th>
						      <th scope="col">Suspend</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $getAllUsers = getAllUsers($pdo); ?>
						  	<?php foreach ($getAllUsers as $row) {?>
						    <tr>
						      <td><?php echo $row['username']; ?></td>
						      <td><?php echo $row['first_name']; ?></td>
						      <td><?php echo $row['last_name']; ?></td>
						      <td><?php echo $row['date_added']; ?></td>
						      <input type="hidden" class="user_id" value="<?php echo $row['user_id']; ?>">
						      <td>
						      	<?php
						      	if ($row['is_admin'] == '1') {
						      		echo "<span>Admin</span>";
						      	}
						      	else {
						      		echo "<span>User</span>";
						      	}  
						      	?>
						      		
						      	</td>
						      <td>
						      	<?php 
						      		if ($row['is_suspended'] == null || $row['is_suspended'] == '0') {
						      			echo "<span class='text-success'>Active</span>";
						      		}
						      		else {
						      			echo "<span class='text-danger'><strong>Suspended</strong></span>";
						      		}
						      	?>
						      </td>
						      <td>
						      	<select class="suspendSelectInputField form-control">
						      		<option value="">Change Account Status</option>
						      		<option value="Suspend">Suspend</option>
						      		<option value="Unsuspend">Unsuspend</option>
						      	</select>
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
  	$('.suspendSelectInputField').on('change', function (event) {
  		if ($(this).val() != "") {
  			event.preventDefault();
  			$.ajax({
  				type:"POST",
  				url:"core/handleForms.php",
  				data: {
  					suspend_or_unsuspend: $(this).val(),
  					user_id: $(this).closest('tr').find('.user_id').val(),
  					suspendOrUnspendUser:1
  				},
  				success: function (data) {
  					location.reload();
  				}
  			})
  		}
  	})
  </script>
  </body>
 </html>
