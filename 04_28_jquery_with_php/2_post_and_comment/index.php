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
						<p class="commentDescription"><?php echo $row['comment_desc']; ?></p>
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
		$('.commentDescription').on('dblclick', function (event) {
			$(this).closest('.commentContainer').toggleClass('redBorder').find('.editCommentForm').toggleClass('d-none')
		});

		$('.postDescription').on('dblclick', function (event) {
			$(this).closest('.postContainer').toggleClass('redBorder').find('.editPostForm').toggleClass('d-none')
		});

		$('#createPostForm').on('submit', function (event) {
			event.preventDefault();
			// Store inside a JSON variable our
			// input field values
			var formData = {
				postDescInputField: $("#postDescInputField").val(),

			    // This key is for us to label this
			    // event inside the PHP script  
			    createNewPost:1
			};

			if (formData.postDescInputField != "") {
				$.ajax({
					type:"POST",
					url: "controller.php",
					data: formData,
					success: function (data) {
						$('.allPosts').load(location.href + " .allPosts");
					}
				})
			}
			else {
				alert("Make sure to not leave anything empty!")
			}
		})

		$('.createCommentForm').on('submit', function (event) {
		    event.preventDefault();

		    var form = $(this); 
		    var commentsContainer = form.closest('.comments');
		    var allCommentsDiv = commentsContainer.find('.allComments');

		    var formData = {
		        commentDescInputField: form.find(".commentDescInputField").val(),
		        postID: commentsContainer.attr('postIDattr'),
		        createNewComment: 1
		    };

		    if (formData.commentDescInputField != "" && formData.postID != "") {
		        $.ajax({
		            type: "POST",
		            url: "controller.php",
		            data: formData,
		            success: function (data) {
		                allCommentsDiv.html(data);
		                form.find(".commentDescInputField").val("");
		                setTimeout(function () {
		     				location.reload()
		     			}, 1000) 

		            }
		        });
		    } 
		    else {
		        alert("Make sure to not leave anything empty!");
		    }
		});

		$('.editPostForm').on('submit', function (event) {
		  event.preventDefault();

		  var postItem = $(this).closest('.allPosts').find('.postContainer')
		  var formData = {
		    postDescForEdit: $(this).find('.postDescForEdit').val(),
		    postIDForEdit: $(this).find('.postIDForEdit').val(),
		    editPost: 1
		  };


		  if (formData.postDescForEdit != "" && formData.postIDForEdit !="") {
		    $.ajax({
			   type:"POST",
			   url: "controller.php",
			   data: formData,
			   success: function (data) {
			   	$('.allPosts').load(location.href + " .allPosts");
			   }
		   });

		  }
		  else {
		  	alert("Make sure to not leave anything empty!");
		  }

		});
		
		$('.editCommentForm').on('submit', function (event) {
		    event.preventDefault();
		    var form = $(this); // Store a reference to the form
		    var commentsContainer = form.closest('.comments');
		    var allCommentsDiv = commentsContainer.find('.allComments'); // Get the .allComments element

		    var formData = {
		        commentDescEditField: form.find('.commentDescEditField').val(),
		        commentIDEditField: form.find('.commentIDEditField').val(),
		        postIDForEdit: commentsContainer.attr('postIDattr'),
		        editComment: 1
		    };

		    if (formData.commentDescEditField != "" && formData.commentIDEditField !="" && formData.postIDForEdit != "") {
		        $.ajax({
		     		type:"POST",
		     		url: "controller.php",
		     		data: formData,
		     		success: function (data) {
		     			allCommentsDiv.html(data);
		     			setTimeout(function () {
		     				location.reload()
		     			}, 1000)
		     		}
		     	});
		    } 
		    else {
		    alert("Make sure to not leave anything empty!");
		  }
		});	
	</script>
</body>
</html>