<?php require_once 'dbConfig.php';?>
<html>
<head>
    <title>Radio Button Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

	<form action="controllers.php" method="POST">
		<p>
			<label for="">First Name</label>
			<input type="text" name="first_name" class="first_name">
		</p>
		<p>
			<label for="">Last Name</label>
			<input type="text" name="last_name" class="last_name">
		</p>
		<p>
			<label for="">Email</label>
			<input type="text" name="email" class="email">
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>

	<div class="container">
    <?php $getAllUsers = getAllUsers($pdo);?>
    <?php foreach ($getAllUsers as $row) { ?>
    	<div class="card shadow" style="border-style: solid; margin-top: 20px;">
    		<div class="card-body">
    			<h4><?php echo $row['first_name'] ?></h4>
	    		<h4><?php echo $row['last_name'] ?></h4>
	    		<h4><?php echo $row['email'] ?></h4>
	    		<h4><?php echo $row['date_added'] ?></h4>
    		</div>
    	</div>
	<?php } ?>
	</div>

<script>
	$('form').on('submit', function (e) {
		e.preventDefault();
		var first_name = $('.first_name').val();
		var last_name = $('.last_name').val();
		var email = $('.email').val();

		$.ajax({
			type: "POST", 
			url: "controllers.php",
			data: {
				insertNewUser: 1,
				first_name: first_name,
				last_name: last_name,
				email: email
			},
			success: function (data) {
				$('.container').load(location.href + " .container");
			}
		})
	})
</script>
</body>
</html>
