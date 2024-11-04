<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";

$conn = new PDO($dsn, $user, $password);
$conn->exec("SET time_zone = '+08:00';");


function showAllUsers($conn)
{
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function updateAdminStatus($conn, $user_id)
{
    $sql = "UPDATE users SET is_admin = 1 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$user_id]);
}

function disableAdminStatus($conn, $user_id)
{
    $sql = "UPDATE users SET is_admin = 0 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$user_id]);
}

if (isset($_POST['makeAdmin'])) {
    $userID = $_POST['userID'];
    if (updateAdminStatus($conn, $userID)) {
        header('Location: index.php');
    }
    else {
        echo "update error";
    }
}

if (isset($_POST['disableAdmin'])) {
    $userID = $_POST['userID'];
    if (disableAdminStatus($conn, $userID)) {
        header('Location: index.php');
    }
    else {
        echo "update error";
    }
}

?>

