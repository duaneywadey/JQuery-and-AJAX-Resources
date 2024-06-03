<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";

$conn = new PDO($dsn, $user, $password);
$conn->exec("SET time_zone = '+08:00';");

function showAllPosts($conn)
{
    $sql = "SELECT * FROM posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function showPostByID($conn, $post_id)
{
    $sql = "SELECT * FROM posts WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    return $stmt->fetch();
}

function showPostByIDWithJSON($conn, $post_id)
{
    $sql = "SELECT * FROM posts WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    $result = $stmt->fetch();

    return $result;
}

function updateAPost($conn, $description, $post_id)
{
    $sql = "UPDATE posts SET description = ? WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$description, $post_id]);
}

if (isset($_GET['post_id'])) {
    $data = json_encode(showPostByIDWithJSON($conn, $_GET['post_id'])); 
    echo $data;
}

if (isset($_POST['updateBtn'])) {
    $post_id = $_POST['post_id'];
    $description = $_POST['description'];

    if(updateAPost($conn, $description, $post_id)) {
         echo $post_id . " - " , $description;
     }

}

// if (isset($_REQUEST['post_id']) && isset($_REQUEST['description'])) {
//     if(updateAPost($conn, $_REQUEST['description'], $_REQUEST['post_id'])) {
//         echo true;
//     }
//     else {
//         echo false;
//     }
// }
?>