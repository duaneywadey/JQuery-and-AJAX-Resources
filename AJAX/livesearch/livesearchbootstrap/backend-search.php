<?php  
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $username, $password);

if (isset($_GET['searchInput'])) {
    $searchInput = $_REQUEST['searchInput'];
    $users = selectAllUsersBySearchQuery($pdo, $searchInput);

    if (!empty($users)) {
        foreach ($users as $row) {
            echo "<div class='col-md-4 mt-4'>
                    <div class='card'>
                        <div class='card-body'>
                        	<h1>{$row['username']}</h1>
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        echo "No data available";
    }
}

function selectAllUsers($pdo)
{
	$sql = "SELECT * FROM users";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function selectAllUsersBySearchQuery($pdo, $searchInput) {
    $sql = "SELECT * FROM users WHERE username LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$searchInput%"]);
    return $stmt->fetchAll();
}


?>