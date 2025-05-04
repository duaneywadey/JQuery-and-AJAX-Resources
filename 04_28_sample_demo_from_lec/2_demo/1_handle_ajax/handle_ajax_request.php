<?php  

// If testAjaxRequest is part of the post request sent,
// we execute this block of code
if (isset($_POST['testAjaxRequest'])) {

	//  Display inputted data in as a string
	echo "Hello there and welcome, " . $_POST['first_name'] 
		 . " " . $_POST['last_name'] .  "The gender you listed is " . $_POST['gender'] . ". AJAX request sent to this file is successful 
		 and yes, legit, this is from the PHP script!"; 
}

?>
