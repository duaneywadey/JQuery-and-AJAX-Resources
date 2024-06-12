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

function seeAllCommentsByPost($conn, $post_id)
{
    $sql = "SELECT * FROM comments WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    return $stmt->fetchAll();
}

function insertIntoActivityLogs($conn, $description, $post_id)
{
    $sql = "INSERT INTO activity_logs (description, post_id) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$description, $post_id]);
}


function showActivityLogsByPostId($conn, $post_id)
{
    $sql = "SELECT * FROM activity_logs WHERE post_id = ? ORDER BY date_created DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    return $stmt->fetchAll();
}

if(isset($_POST['postDescription'])) {
    if(updateAPost($conn, $_POST['postDescription'], $_POST['postID'])) {
        header('Location: tables.php');
    }
}


// $showPostByID = showPostByID($conn, 8);
// $seeAllCommentsByPost = seeAllCommentsByPost($conn, 8);
// $data = array(
//     'showPostByID' => $showPostByID,
//     'seeAllCommentsByPost' => $seeAllCommentsByPost,
// );


// echo "<pre>";
// print_r($seeAllCommentsByPost);
// echo "<pre>";



?>

