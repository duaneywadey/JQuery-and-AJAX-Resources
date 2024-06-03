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

if (isset($_GET['post_id'])) {

    $showPostByID = showPostByID($conn, $_GET['post_id']);
    $seeAllCommentsByPost = seeAllCommentsByPost($conn, $_GET['post_id']);
    $data = array(
        'showPostByID' => $showPostByID,
        'seeAllCommentsByPost' => $seeAllCommentsByPost,
    );

    echo json_encode($data);
}


if (isset($_REQUEST['post_id']) && isset($_REQUEST['description'])) {
    if(updateAPost($conn, $_REQUEST['description'], $_REQUEST['post_id'])) {
        echo true;
    }
    else {
        echo false;
    }
}

if (isset($_REQUEST['seeComments'])) {
    if (seeAllCommentsByPost($conn, $_REQUEST['post_id'])) {
        $data = json_encode(seeAllCommentsByPost($conn, $_REQUEST['post_id']));
        echo $data;
    }
}


$showPostByID = showPostByID($conn, 20);
$seeAllCommentsByPost = seeAllCommentsByPost($conn, 20);
$data = array(
    'showPostByID' => $showPostByID,
    'seeAllCommentsByPost' => $seeAllCommentsByPost,
);

echo json_encode($data);


?>