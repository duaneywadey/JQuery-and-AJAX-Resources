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

    $values = array(
        "description"=> $result['description'],
        "date_posted" => $result['date_posted']
    );

    // JSON ENCODE
    return json_encode($values);
}

function updateAPost($conn, $description, $post_id)
{
    $sql = "UPDATE posts SET description = ? WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$description, $post_id]);
}

if (isset($_POST['post_id']) && isset($_POST['description'])) {
    if(updateAPost($conn, $_POST['description'], $_POST['post_id'])) {
        echo true;
    }
    else {
        echo false;
    }
}
?>