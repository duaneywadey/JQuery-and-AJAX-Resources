<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET time_zone = '+08:00';");

function getAllOrders($pdo) {
    $sql = "SELECT * FROM tbl_order";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getOrderByID($pdo, $order_id) {
    $sql = "SELECT * FROM tbl_order WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$order_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

?>