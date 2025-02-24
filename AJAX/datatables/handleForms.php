<?php  
require_once 'dbConfig.php';

if (isset($_GET['getUserByIDBtn'])) {
    $user_id = $_GET['user_id'];
    $getUserByID = getUserByID($pdo, $user_id);
    echo $getUserByID;
}


if (isset($_POST['editUserBtn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $updateQuery = updateUser($pdo, $first_name, $last_name, $email, $user_id);
    
    if ($updateQuery) {
        echo true;
    }
}

if (isset($_POST['deleteUserBtn'])) {
    $updateQuery = deleteUser($pdo, $_POST['user_id']);
    
    if ($updateQuery) {
        return true;
    }
}

?>