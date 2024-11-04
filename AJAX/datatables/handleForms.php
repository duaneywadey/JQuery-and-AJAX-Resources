<?php  

require_once 'dbConfig.php';
$getAllUsers = getAllUsers($pdo);


$columns = array(
    array( 'db' => 'first_name', 'dt' => 'first_name' ),
    array( 'db' => 'last_name',  'dt' => 'last_name' ),
    array( 'db' => 'email',   'dt' => 'email' ),
);


// DB table to use
$table = 'mock_data';
 
// Table's primary key
$primaryKey = 'id';



// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'test',
    'host' => 'localhost'
);

require('ssp.class.php');

echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);

?>