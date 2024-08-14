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
		<div class="row">
			<ul>
				<li><a href="all-posts.php">All Posts</a></li>
				<li><a href="limit-posts.php">Limit Posts</a></li>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
		<div class="row">
			<?php $getAllNamesAndPosts = getAllNamesAndPosts($pdo); ?>
			<?php foreach ($getAllNamesAndPosts as $col) { ?>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h1><?php echo $col['fullName'];?></h1>
					</div>
					<div class="card-body">
						<p><?php echo $col['postDescription']; ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>