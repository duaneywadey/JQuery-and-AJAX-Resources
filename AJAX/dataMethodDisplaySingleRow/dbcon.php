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
        "date_posted" => $result['date_posted'],
        "status" => 200,
        "message" => 'Student Updated Successfully'
    );

    // JSON ENCODE
    return json_encode($values);
}

function showAllCommentsByPost($conn, $post_id)
{
    $sql = "SELECT * FROM comments WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    $result = $stmt->fetchAll();
    return json_encode($result);

}

function showLatestCommentByPost($conn, $post_id)
{
    $sql = "SELECT * FROM comments
            WHERE post_id = ? 
            ORDER BY date_added DESC
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id]);
    $result = $stmt->fetch();
    $values = array(
        "description"=> $result['description'],
        "date_added" => $result['date_added']
    );

    return json_encode($values);
}

function updateAPost($conn, $description, $post_id)
{
    $sql = "UPDATE posts SET description = ? WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$description, $post_id]);
}

function addAComment($conn, $post_id, $user_id, $commentDescription) {
    $sql = "
            INSERT INTO comments (post_id, user_id, description)
            VALUES (?,?,?)
            ";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$post_id, $user_id, $commentDescription]);
}


if (isset($_POST['getPost'])) {
    $postID = $_POST['postID'];
    $showPostByIDWithJSON = showPostByIDWithJSON($conn, $postID);
    echo $showPostByIDWithJSON;
}

if (isset($_POST['getComments'])) {
    $postID = $_POST['postID'];
    $showAllCommentsByPost = showAllCommentsByPost($conn, $postID);
    echo $showAllCommentsByPost;
}

if (isset($_POST['submitCommentBtn'])) {
    $postID = $_POST['postID'];
    $commentDescription = $_POST['commentDescription'];
    $showAllCommentsByPost = showAllCommentsByPost($conn, $postID);
    $showLatestCommentByPost = showLatestCommentByPost($conn, $postID);
    if(addAComment($conn, $postID, 26, $commentDescription)) {
        echo true;
    }
}




?>