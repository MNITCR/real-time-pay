<?php
require_once "./conn.php";
session_start();

// Fetch all data
$stmt = $conn->prepare("SELECT u.image_path, p.user_id, p.balance_r_d,
    p.sender, p.receiver, p.amount, p.description,
    p.status, p.payment_date
    FROM user_tbl u INNER JOIN payment_tbl p ON u.user_id = p.user_id WHERE p.user_id = ?");
$stmt->execute([$_SESSION["user_id"]]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return all data as JSON
header('Content-Type: application/json');
echo json_encode($rows);
