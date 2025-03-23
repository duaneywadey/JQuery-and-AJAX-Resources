<?php 
require_once 'dbConfig.php'; 

if (isset($_GET['pageNo']) && isset($_GET['pageNo']) !== "") {
  $pageNo = $_GET['pageNo'];
}
else {
  $pageNo = 1;
}

// Call the function to get all users
$allUsersQuery = getAllUsers($pdo);

// Get how many records are there
$totalRecords = $allUsersQuery['rowCount'];

// Set no. of records per page
$totalRecordsPerPage = 10;

// Total no. of pages = totalNumOfRecords / totalRecordsPerPage
$totalNumOfPages = ceil($totalRecords / $totalRecordsPerPage);

$offset = ($pageNo - 1) * $totalRecordsPerPage;

$previousPage = $pageNo - 1;
$nextPage = $pageNo + 1;

$paginationQuery = getAllUsersForPagination($pdo, $offset, $totalRecordsPerPage);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
		<div class="card mt-4 tableCard">
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
						<?php $getAllUsers = $paginationQuery['getAllUsers']; ?>
						<?php foreach ($getAllUsers as $row) { ?>
						<tr data-userid=<?php echo $row['id']; ?>>
							<td class="firstNameCol"><?php echo $row['first_name']; ?></td>
							<td class="lastNameCol"><?php echo $row['last_name']; ?></td>
							<td class="emailCol"><?php echo $row['email']; ?></td>
							<td class="actionCol">
								<button type="button" class="btn btn-primary showEditModal" data-toggle="modal" data-target="#editModal">Edit</button>
								<button type="button" class="btn btn-danger showDeleteModal" data-toggle="modal" data-target="#deleteModal">Delete</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<p>Total Results: <?php echo $allUsersQuery['rowCount']; ?></p>

 
      <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?php if ($pageNo <= 1) { echo "disabled"; } ?>">
                <a class="page-link" href="<?php if ($pageNo > 1) { echo '?pageNo=' . $previousPage; } ?>">Previous</a>
            </li>

            <?php
            // Define how many pages to show before and after the current page
            $range = 2;

            // Start here 
            $start = max(1, $pageNo - $range);

            // End here 
            $end = min($pageNo + $range, $totalNumOfPages);

            // Show first page
            if ($start > 1) {
                echo '<li class="page-item"><a class="page-link" href="?pageNo=1">1</a></li>';
            }

            // Show pages in range
            for ($counter = $start; $counter <= $end; $counter++) {
                if ($pageNo == $counter) {
                    echo '<li class="page-item active"><a class="page-link" href="?pageNo=' . $counter . '">' . $counter . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="?pageNo=' . $counter . '">' . $counter . '</a></li>';
                }
            }

            // Show last page
            if ($end < $totalNumOfPages) {
                echo '<li class="page-item"><a class="page-link" href="?pageNo=' . $totalNumOfPages . '">' . $totalNumOfPages . '</a></li>';
            }

            ?>

            <li class="page-item <?php if ($pageNo >= $totalNumOfPages) { echo "disabled"; } ?>">
                <a class="page-link" href="<?php if ($pageNo < $totalNumOfPages) { echo '?pageNo=' . $nextPage; } ?>">Next</a>
            </li>
        </ul>
      </nav> 
	</div>

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form id="editUserForm" action="">
		      	<div class="form-group">
		      		<label>First Name</label>
		      		<input type="hidden" class="userIDInput">
		      		<input type="text" class="firstNameInput form-control">
		      	</div>
		      	<div class="form-group">
		      		<label>Last Name</label>
		      		<input type="text" class="lastNameInput form-control">
		      	</div>
		      	<div class="form-group">
		      		<label>Email</label>
		      		<input type="email" class="emailInput form-control">
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary editBtn">Save Changes</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Delete Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<p>Are you sure you want to delete user <span class="userID"></span></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary deleteBtn">Delete</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script>

		$('table').DataTable();

		$('.showEditModal').on('click', function (e) {
			e.preventDefault();
			var user_id = $(this).closest('tr').data('userid');

			console.log("The userid is " + user_id);

			$.ajax({
				type:"GET",
				url: "handleForms.php",
				dataType: "json",
				data: {
					getUserByIDBtn:1,
					user_id:user_id
				},
				success: function (response) {
					console.log(response);
					$('#editModal').find('.firstNameInput').val(response.first_name);
					$('#editModal').find('.lastNameInput').val(response.last_name);
					$('#editModal').find('.emailInput').val(response.email);
					$('#editModal').find('.userIDInput').val(response.id);
				}
			})

		});

		$('.editBtn').on('click', function (e) {
			var user_id = $(this).closest('div')
								 .siblings('.modal-body')
								 .find('.userIDInput').val()

			var first_name = $(this).closest('div')
									.siblings('.modal-body').
									find('.firstNameInput').val()

			var last_name = $(this).closest('div')
							       .siblings('.modal-body')
							       .find('.lastNameInput').val()

			var email = $(this).closest('div')
							   .siblings('.modal-body')
							   .find('.emailInput').val()
			$.ajax({
				type: "POST",
				url: "handleForms.php",
				data: {
					editUserBtn: 1,
					first_name: first_name,
					last_name: last_name,
					email: email,
					user_id: user_id
				},
				success: function (e) {
					$('#editModal').modal('hide');
					$('table').load(location.href + " table");
				}
			})
		})

		$('.showDeleteModal').on('click', function (e) {
			var user_id = $(this).closest('tr').data('userid');
		})

		$('.deleteBtn').on('click', function (e) {
			var id = $(this).closest('tr').data('userid');
			$.ajax({
				type: "POST",
				url: "handleForms.php",
				data: {
					deleteUserBtn: 1,
					user_id: user_id
				},
				success: function (e) {
					console.log(e)
				}
			})
		})


	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>