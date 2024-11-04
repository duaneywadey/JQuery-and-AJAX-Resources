<?php require_once 'dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<style>
		.tableCard input {
			width: 300px;
			height: 50px;
		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="card shadow mt-4 tableCard">
			<div class="card-body">
				<table id="example" class="table table-bordered display" style="width:100%">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
						<?php $getAllUsers = getAllUsers($pdo); ?>
						<?php foreach ($getAllUsers as $row) { ?>
						<tr>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td>
								<a href="edit.php" class="btn btn-primary">Edit</a>
								<a href="delete.php" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$('table').DataTable();
	</script>
</body>
</html>