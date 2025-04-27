<?php  
require_once 'dbcon.php';
require_once 'models.php';

if (isset($_POST['createNewPost'])) {
	$postDescInputField = $_POST['postDescInputField'];
	echo insertAPost($pdo, $postDescInputField);
}

if (isset($_POST['createNewComment'])) {
	$commentDescInputField = $_POST['commentDescInputField'];
	$postID = $_POST['postID'];
	insertAComment($pdo, $postID, $commentDescInputField);
	$getAllCommentsByPostID = getAllCommentsByPostID($pdo, $postID);
	foreach ($getAllCommentsByPostID as $row) {
		echo '<div class="commentContainer" style="margin-top: 10px;">
						<p class="commentDescription">' . $row['comment_desc'] . '</p>
						<form class="editCommentForm d-none">
							<input type="hidden" class="commentIDEditField" 
							value="' . $row['mock_comment_id'] . '"
							>
							<input type="text" class="commentDescEditField"
							value="' . $row["comment_desc"] . '"
							>
							<input type="submit" value="Submit">
						</form>
					</div>';
	}
}

if (isset($_POST['editPost'])) {
	$postDescForEdit = $_POST['postDescForEdit'];
	$postIDForEdit = $_POST['postIDForEdit'];
	updateAPost($pdo, $postDescForEdit, $postIDForEdit);
}

if (isset($_POST['editComment'])) {
	$commentDescEditField = $_POST['commentDescEditField'];
	$commentIDEditField = $_POST['commentIDEditField'];
	$postIDForEdit = $_POST['postIDForEdit'];
	updateAComment($pdo, $commentDescEditField, $commentIDEditField);
	$getAllCommentsByPostID = getAllCommentsByPostID($pdo, $postIDForEdit);
	foreach ($getAllCommentsByPostID as $row) {
		echo '<div class="commentContainer" style="margin-top: 10px;">
						<p class="commentDescription">' . $row['comment_desc'] . '</p>
						<form class="editCommentForm d-none">
							<input type="hidden" class="commentIDEditField" 
							value="' . $row['mock_comment_id'] . '"
							>
							<input type="text" class="commentDescEditField"
							value="' . $row["comment_desc"] . '"
							>
							<input type="submit" value="Submit">
						</form>
					</div>';
	}

}

?>