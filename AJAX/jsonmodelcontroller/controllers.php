<?php  

require_once 'models.php';

if (isset($_GET['getJSONVal'])) {
    $getAllOrders = getAllOrders($pdo);
    echo json_encode($getAllOrders);
}

if (isset($_GET['getJSONOrder'])) {
    $orderValue = $_GET['orderValue'];
    $getOrderByID = getOrderByID($pdo, $orderValue);
    echo json_encode($getOrderByID);
}

?>