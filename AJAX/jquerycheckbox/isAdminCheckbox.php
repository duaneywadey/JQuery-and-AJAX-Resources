<?php require_once 'form.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<style>
		.userProfile {
			margin-top: 10px;
			font-size: 2em;
			border-style: solid;
		}
	</style>
</head>
<body>
	<?php $showAllUsers = showAllUsers($conn); ?>
	<?php foreach ($showAllUsers as $user) { ?>
	<div class="userProfile" data-userid = <?php echo $user['user_id']; ?>>
		<h2><?php echo $user['username']; ?></h2>
		<h4>Admin Status:<?php echo $user['is_admin']; ?></h4>

		<?php if ($user['is_admin'] == 0) { ?>
			<input type="checkbox" id="scales" name="scales" class="singleCheckbox"/>
		    <label for="scales">Make Admin</label>
		<?php } else { ?>
			<input type="checkbox" id="scales" name="scales" class="singleCheckbox" checked />
		    <label for="scales">Admin</label>
		<?php } ?>	

	</div>
	<?php  } ?>

	<script>
		$('.singleCheckbox').on('change', function (e) {
			var userID = $(this).closest('div').data('userid');
			if (!$(this).is(':checked')) {
				$.ajax({
					url:'form.php',
					method:'POST',
					data:{
						disableAdmin:1,
						userID:userID
					},
					success: function (data) {
						location.reload();
					}
				})
			}
			else {
				$.ajax({
					url:'form.php',
					method:'POST',
					data:{
						makeAdmin:1,
						userID:userID
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