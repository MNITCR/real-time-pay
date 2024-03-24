<?php
require_once("./conn.php");
session_start();

$stmt = $conn->prepare("SELECT user_id, account_number_eg, account_number_kh, balance_eg, balance_kh FROM account_tbl WHERE user_id  = ?");
$stmt->execute([$_SESSION["user_id"]]);

if ($stmt) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($rows);
}
