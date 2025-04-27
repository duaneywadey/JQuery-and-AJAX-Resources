<?php 
require_once 'dbcon.php';

function getAllPosts($pdo) {
	$sql = "SELECT * FROM mock_posts_data 
			ORDER BY date_added DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getPostByID($pdo, $post_id) {
	$sql = "SELECT * FROM mock_posts_data
			WHERE mock_post_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$post_id]);
	return $stmt->fetch();
}

function getCommentByID($pdo, $comment_id) {
	$sql = "SELECT * FROM mock_comments_data
			WHERE mock_comment_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$post_id]);
	return $stmt->fetch();
}

function getAllCommentsByPostID($pdo, $post_id) {
	$sql = "SELECT * FROM mock_comments_data 
			WHERE post_id = ?
			ORDER BY date_added DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$post_id]);
	return $stmt->fetchAll();
}

function insertAPost($pdo, $post_desc) {
	$sql = "INSERT INTO mock_posts_data (post_desc) VALUES(?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$post_desc]);
}

function insertAComment($pdo, $post_id, $comment_desc) {
	$sql = "INSERT INTO mock_comments_data (post_id,comment_desc) VALUES(?,?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$post_id, $comment_desc]);
}

function updateAPost($pdo, $post_desc, $post_id) {
	$sql = "UPDATE mock_posts_data SET post_desc = ? 
			WHERE mock_post_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$post_desc, $post_id]);
}

function updateAComment($pdo, $comment_desc, $comment_id,) {
	$sql = "UPDATE mock_comments_data SET comment_desc = ? 
			WHERE mock_comment_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$comment_desc, $comment_id]);
}


?>