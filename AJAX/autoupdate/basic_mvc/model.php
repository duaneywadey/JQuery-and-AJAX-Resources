<?php  
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

function returnAllNames($conn) {
    $sql = "SELECT * FROM name_and_networth";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


function updateTheNetWorth($conn, $net_worth, $id) {
    $sql = "UPDATE name_and_networth SET net_worth = ? WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$net_worth, $id]);
}
?>