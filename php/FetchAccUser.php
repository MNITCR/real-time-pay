<?php
require_once "./conn.php";
session_start();

// Fetch user data
$stmt = $conn->prepare("SELECT user_id, first_name, last_name,
    phone, email, qrcode
    FROM user_tbl
    WHERE user_id = ?");
$stmt->execute([$_SESSION["user_id"]]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return all data as JSON
header('Content-Type: application/json');
echo json_encode($rows);
