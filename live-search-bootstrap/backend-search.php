<?php  
$conn = mysqli_connect('localhost', 'root', '', 'yahoo_baba') or die('Connection error!');

if(isset($_REQUEST['searchInput'])) {

	$searchInput = $_REQUEST['searchInput'];
	$sql = "SELECT * FROM students WHERE CONCAT(first_name, last_name) LIKE '%$searchInput%' ";
	$sql_query_run = mysqli_query($conn, $sql);

	if(mysqli_num_rows($sql_query_run) > 0) {
		while ($row = $sql_query_run->fetch_assoc()) {
			echo "
				<div class='col-md-4 mt-4'>
					<div class='card'>
						<div class='card-body'>
							<h1>".
							$row['first_name'] .' '. $row['last_name']
							."</h1>
						</div>
					</div>
		        </div>
			";
		}
	}
	else {
		echo "No data available";
	}

}

?>