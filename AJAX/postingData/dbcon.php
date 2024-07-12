<?php  
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $username, $password);

if(isset($_POST["submitBtn"]))  
{  
  $title = $_POST["title"];  
  $description = $_POST["description"];  
  $sql = "INSERT INTO jsontest (title, description) VALUES (?,?)";
  $stmt = $pdo->prepare($sql);
  $isSubmitted = $stmt->execute([$title, $description]);

  if($isSubmitted)  
  {  
       echo '<p>You have entered</p>';  
       echo '<p>Name:'.$title.'</p>';  
       echo '<p>Message : '.$description.'</p>';  
  }
  else {
    echo "<script>alert('Info not sent');</script>";
  }  
}  

?>