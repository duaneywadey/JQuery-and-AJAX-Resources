<?php  

if (isset($_POST['showID'])) {
	$postid = $_POST['postid'];
	$pTag = $_POST['pTag'];
	echo "The postid is" . $postid . $pTag;
}


?>