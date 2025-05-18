<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Lightbox Example</title>
  <?php include 'includes/header.php'; ?>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card shadow mt-4 p-4">
    				<div class="card-header"><h2>Categories</h2></div>
    				<div class="card-body">
    					<form action="core/handleForms.php" method="POST">
    						<div class="form-group">
    							<label for="#">Category Name</label>
    							<input type="text" class="form-control" name="category_name">
    							<input type="submit" class="btn btn-primary mt-2 mb-4 float-right" name="insertCategoryBtn">
    						</div>
    					</form>
    					<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Name</th>
						      <th scope="col">Added By</th>
						      <th scope="col">Date Added</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $getAllCategories = getAllCategories($pdo); ?>
						  	<?php foreach ($getAllCategories as $row) { ?>
						    <tr unsplash_category_id = "<?php echo $row['unsplash_category_id']; ?>">
						      <td><?php echo $row['category_name']; ?></td>
						      <td><?php echo $row['username']; ?></td>
						      <td><?php echo $row['date_added']; ?></td>
						      <td><button class="btn btn-danger deleteCategory">Delete <i class="fa fa-trash" aria-hidden="true"></i></button></td>
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
  	$('.deleteCategory').on('click', function (event) {
  		event.preventDefault();
  		var tableRow = $(this).closest('tr');
  		var unsplash_category_id = tableRow.attr('unsplash_category_id');
  		if (confirm("Are you sure you want to delete this category?")) {
	  		$.ajax({
	  			type:"POST",
	  			url:"core/handleForms.php",
	  			data: {
	  				unsplash_category_id: unsplash_category_id,
	  				deleteCategory:1
	  			},
	  			success:function (data) {
	  				tableRow.fadeOut();
	  				setTimeout(function() {
              location.reload();
            }, 1000);
	  			}
	  		})
  		}
  	})
  </script>
  </body>
 </html>
