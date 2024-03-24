<?php
require_once("./conn.php");
session_start();

$stmt = $conn->prepare("SELECT history_accNum_id, account_number, user_name, history_accNum_date FROM history_accnum_tbl WHERE user_id = ?");
$stmt->execute([$_SESSION["user_id"]]);

if ($stmt) {
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo json_decode($accounts);
    header('Content-Type: application/json');
    echo json_encode($accounts);
}
