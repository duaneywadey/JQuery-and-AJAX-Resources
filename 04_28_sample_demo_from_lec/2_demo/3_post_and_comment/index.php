<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<style>
		body {
			font-family: 'Arial';
		}
		input, button {
			font-size: 1.5em;
			padding: 10px;
		}
		.d-none {
			display: none;
		}
		.redBorder {
			border: 5px solid red;
			padding: 25px;
		}
	</style>
</head>
<body>
	<h1>
		<i>Guide: Double click to edit post and comment</i>
	</h1>

	<h3 class="fadeOutTest">Click to fade out</h3>

	<form id="createPostForm">
		<input type="text" id="postDescInputField" placeholder="type your post here!">
		<input type="submit" value="Submit">
	</form>

	<div class="allPosts">
		<?php $allPosts = getAllPosts($pdo);?>
		<?php foreach ($allPosts as $row) { ?>
		<div class="postContainer" style="border-style:solid; padding: 25px; margin-top: 25px;">
			<h2 class="postDescription"><?php echo $row['post_desc']; ?></h2>
			<i><?php echo $row['date_added']; ?></i>
			<p><button class="deletePostBtn">Delete Post</button></p>
			<form class="editPostForm d-none">
				<input type="hidden" class="postIDForEdit" value="<?php echo $row['mock_post_id']; ?>">
				<input type="text" class="postDescForEdit" value="<?php echo $row['post_desc']; ?>">
				<input type="submit" value="Submit">
			</form>
			<div class="comments" style="border: 1px solid gray; padding: 25px; margin-top: 25px;" postIDattr="<?php echo $row['mock_post_id']; ?>">
				<div class="allComments">
					<?php $getAllCommentsByPostID = getAllCommentsByPostID($pdo, $row['mock_post_id']); ?>
					<?php foreach ($getAllCommentsByPostID as $row) { ?>
					<div class="commentContainer" style="margin-top: 10px;">
						<p class="commentDescription"><?php echo $row['comment_desc']; ?></p><button class="deleteCommentBtn">Delete Comment</button>
						<form class="editCommentForm d-none">
							<input type="hidden" class="commentIDEditField" value="<?php echo $row['mock_comment_id'] ?>">
							<input type="text" class="commentDescEditField" value="<?php echo $row['comment_desc'] ?>">
							<input type="submit" value="Submit">
						</form>
					</div>
					<?php } ?>
				</div>
				<form class="createCommentForm" style="margin-top:50px">
					<input type="text" class="commentDescInputField" placeholder="add comment here">
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
	<script>
		// If comment description is double clicked, an input field is displayed
		// to edit the comment 
		$('.commentDescription').on('dblclick', function (event) {
			$(this)
				.closest('.commentContainer')
				.toggleClass('redBorder')
				.find('.editCommentForm')
				.toggleClass('d-none')
		});

		// If post description is double clicked, an input field is displayed
		// to edit the post 
		$('.postDescription').on('dblclick', function (event) {
			$(this)
				.closest('.postContainer')
				.toggleClass('redBorder')
				.find('.editPostForm')
				.toggleClass('d-none')
		});

		// If submit event is detected on the createPostForm element,
		// execute the following
		$('#createPostForm').on('submit', function (event) {
			
			// To prevent the entire page from reloading
			event.preventDefault();
			
			// Store inside a JSON variable our
			// input field values
			var formData = {
				postDescInputField: $("#postDescInputField").val(),

			    // This key is for us to label this
			    // event inside the PHP script  
			    createNewPost:1
			};

			// We make sure the input field is not empty before 
			// we insert it to the database
			if (formData.postDescInputField != "") {
				$.ajax({

					// We are sending a POST request the server
					type:"POST",

					// Specifies the file/url to send our AJAX request to
					url: "controller.php",

					// We specify the object that the PHP script should expect
					// it's the object with key-value pairs shown above
					data: formData,
					success: function (data) {
						// if php script returns true, refresh the page
						// in its current state
						location.reload();
					}
				})
			}
			else {
				alert("Make sure to not leave anything empty!")
			}
		})

		$('.createCommentForm').on('submit', function (event) {
	
			// To prevent the entire page from reloading
			event.preventDefault();

			// Declare a variable for this form
			var form = $(this); 

			// Find the closest element showing the comments
			var commentsContainer = form.closest('.comments');

			var formData = {

				// Find inside the form that element with 
				// commentDescInputField class name
				commentDescInputField: form.find(".commentDescInputField").val(),

				// Find the postID we're placing the comment to
				postID: commentsContainer.attr('postIDattr'),

				// We name our request so the PHP script recognizes it
				createNewComment: 1
			};

			if (formData.commentDescInputField != "" && formData.postID != "") {
				$.ajax({

					// We are sending a POST request the server
					type: "POST",

					// Specifies the file/url to send our AJAX request to
					url: "controller.php",

					// We specify the object that the PHP script should expect
					// it's the object with key-value pairs shown above
					data: formData,
					success: function (data) {
						// if php script returns true, refresh the page
						// in its current state
						location.reload();
					}
				});
			} 
			else {
				alert("Make sure to not leave anything empty!");
			}
		});

		$('.editPostForm').on('submit', function (event) {
	
			// To prevent the entire page from reloading
			event.preventDefault();

			// The object we'll be sending to the server
			var formData = {
				postDescForEdit: $(this).find('.postDescForEdit').val(),
				postIDForEdit: $(this).find('.postIDForEdit').val(),
				editPost: 1
			};

			// We make sure the input field is not empty before updating 
			// the post to the database
			if (formData.postDescForEdit != "" && formData.postIDForEdit !="") {
				$.ajax({

					// We are sending a POST request the server
					type:"POST",

					// Specifies the file/url to send our AJAX request to
					url: "controller.php",

					// We specify the object that the PHP script should expect
					// it's the object with key-value pairs shown above

					data: formData,
					success: function (data) {
						// if php script returns true, refresh the page
						// in its current state
						location.reload();	
					}
				});

			}
			else {
				alert("Make sure to not leave anything empty!");
			}

		});

		$('.editCommentForm').on('submit', function (event) {
	
			// To prevent the entire page from reloading
			event.preventDefault();

			// Declare a variable for this form
		    var form = $(this);

		    // Find the closest div storing the comments
		    var commentsContainer = form.closest('.comments');

		    // Object we'll be sending to the server
		    var formData = {

		    	// Find the comment description input inside the form
		    	commentDescEditField: form.find('.commentDescEditField').val(),

		    	// Find the comment ID input inside the form
		    	commentIDEditField: form.find('.commentIDEditField').val(),

				// We name our request so the PHP script recognizes it
		    	editComment: 1
		    };

		    if (formData.commentDescEditField != "" && formData.commentIDEditField !="" && formData.postIDForEdit != "") {
		    	$.ajax({

		    		// We are sending a POST request the server
		    		type:"POST",

		    		// Specifies the file/url to send our AJAX request to
		    		url: "controller.php",

		    		// We specify the object that the PHP script should expect
		    		// it's the object with key-value pairs shown above
		    		data: formData,
		    		success: function (data) {
		    			// if php script returns true, refresh the page
		    			// in its current state
		    			location.reload()
		    		}
		    	});
		    } 
		    else {
		    	alert("Make sure to not leave anything empty!");
		    }
		});

		$('.deletePostBtn').on('click', function (event) {
	
			// To prevent the entire page from reloading
			event.preventDefault();
			var postContainer = $(this).closest('.postContainer');
			var postID = postContainer.find('.postIDForEdit').val();
			$.ajax({

				// We are sending a POST request the server
				type:"POST",

				// Specifies the file/url to send our AJAX request to
				url: "controller.php",
				data:{
					postID: postID,
					deleteAPost: 1
				},
				success: function (data) {
					console.log(data);

					// Add fade out effect when deleting something			
					postContainer.fadeOut();
				}
			})
		})

		$('.deleteCommentBtn').on('click', function (event) {
			
			// To prevent the entire page from reloading
			event.preventDefault();
			var commentContainer = $(this).closest('.commentContainer');
			var commentID = commentContainer.find('.commentIDEditField').val();
			$.ajax({

				// We are sending a POST request the server
				type:"POST",

				// Specifies the file/url to send our AJAX request to
				url: "controller.php",
				data:{
					commentID: commentID,
					deleteAComment: 1
				},
				success: function (data) {
					console.log(data);

					// Add fade out effect when deleting something	
					commentContainer.fadeOut();
				}
			})
		})
	</script>
</body>
</html>