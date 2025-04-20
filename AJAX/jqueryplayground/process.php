<?php  
if ($_POST['testForm']) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$arr = array(
		'name' => $name,
		'email' => $email
	);

	$newArr = [
		['firstName'=>'Ivan', "lastName" => 'Duane', 'age' => '25'],
		['firstName'=>'Duane2', "lastName" => 'Duane', 'age' => '26'],
		['firstName'=>'Duane3', "lastName" => 'Duane', 'age' => '26']
	];
	echo json_encode($newArr);
}

?>