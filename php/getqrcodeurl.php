<?php
session_start();

require_once("./conn.php");

$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare("SELECT user_id,qrcode FROM user_tbl WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($user["qrcode"]);
