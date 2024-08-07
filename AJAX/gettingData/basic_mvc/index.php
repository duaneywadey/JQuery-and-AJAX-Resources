<?php 
require_once 'dbcon.php'; 
require_once 'controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="searchInput">
		<input type="text" class="searchInputField">
	</div>
	<div class="tableForAllRecords">
		<table style="margin-top:20px;">
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
			</tr>
			<?php $getAllUsers = getAllUsers($conn); ?>
			<?php foreach ($getAllUsers as $user) { ?>
				<tr class="allRecords"data-userid=<?php echo $user['id'];?>>
					<td><?php echo $user['id']; ?></td>
					<td><?php echo $user['first_name']; ?></td>
					<td><?php echo $user['last_name']; ?></td>
					<td><?php echo $user['email']; ?></td>
					<td><?php echo $user['gender']; ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="tableForSearchResults">
		<table style="margin-top:20px;">
		</table>
	</div>	
	<script>
		
		$('.singleRow').on('click', function (e) {
			var userid = $(this).data('userid');
		})

		$('.searchInputField').on('input', function (e) {
			var keyword = $(this).val();
			$.ajax({
				method:'POST',
				url:'controller.php',
				data:{
					searchAUser:1,
					keyword:keyword
				},
				success: function (data) {
					if (keyword.length) {
						$('.tableForAllRecords').hide();
						$('.tableForSearchResults table').html(data);
					}
					else {
						$('.tableForAllRecords').show();
					}
				}
			})
		})

	</script>
</body>
</html>