<?php require_once 'basic_mvc/dbcon.php'; ?>
<?php require_once 'basic_mvc/controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<form action="dbcon.php" id="editForm">
		<?php $showPostByID = showPostByID($conn, $_GET['post_id']); ?>
		<input type="hidden" id="post_id" value="<?php echo $_GET['post_id']; ?>">
		<textarea name="description" id="description" cols="100" rows="5"><?php echo $showPostByID['description']; ?></textarea>
	</form>
	<a href="index.php">Return to home</a>

	<script>
		$(document).ready(function (e) {
			$('#description').on("input", function (e) {
				e.preventDefault();
				var post_id = $('#post_id').val();
				var description = $('#description').val();

				if(description!="") {
						$.ajax({
							url:"basic_mvc/controller.php",
							method:"POST",
							data: {
								description:description,
								post_id:post_id
							},
						dataType:"text",
						success: function (data) {
							console.log(data);
						}
					})
				}
				else {
					alert("Make sure the fields are complete!");
				}
				
			})
		})

	</script>
</body>
</html>