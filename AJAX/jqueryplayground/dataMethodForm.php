<?php  

if (isset($_POST['showID'])) {
	$postid = $_POST['postid'];
	$findMe = $_POST['findMe'];
	echo "The postid is" . $postid . " ,and the text written there is " . $findMe;
}


?>