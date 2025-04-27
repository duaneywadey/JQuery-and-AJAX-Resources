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
}

?>