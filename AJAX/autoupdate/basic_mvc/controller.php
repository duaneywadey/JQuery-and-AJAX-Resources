<?php 
require_once 'dbcon.php';
require_once 'model.php';

if (isset($_POST['post_id']) && isset($_POST['description'])) {
    if(updateAPost($conn, $_POST['description'], $_POST['post_id'])) {
        echo true;
    }
    else {
        echo false;
    }
}

if (isset($_POST['changeNetWorth'])) {
    $userID = $_POST['userID'];
    $numberInputField = $_POST['numberInputField'];
    updateTheNetWorth($conn, $numberInputField, $userID);
}
?>