<?php  

// If testAjaxRequest is part of the post request sent,
// we execute this block of code
if (isset($_POST['testAjaxRequest'])) {

	// We initialize a PHP array and make it a JSON variable
	$jsonData = [

		// We store the input values inside a JSON variable
		"first_name"=> $_POST['first_name'],
		"last_name"=> $_POST['last_name'],
		"gender"=> $_POST['gender'],

		// Additional key value pairs to identify 
		// if request is successfull
		"statusOfRequest"=> 200,
		"greeting"=>"Hello there and welcome",
		"message"=>"AJAX request sent to this file is successful!",
		"messageFromPHPScript"=>"Yes, legit, this is from the PHP script!"
	];

	// Encode the PHP array to JSON data
	echo json_encode($jsonData);

	// Only if we want to display data in string
	// echo "Hello there and welcome," . $_POST['first_name'] . " " . $_POST['last_name'] . ". AJAX request sent to this file is successful and yes, legit, this is from the PHP script!"; 
}

?>