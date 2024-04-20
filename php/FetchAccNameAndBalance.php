<?php
require_once("./conn.php");
session_start();

$stmt = $conn->prepare("SELECT u.first_name, u.last_name, u.token, b.user_id, b.account_number_eg, b.account_number_kh, b.balance_eg, b.balance_kh FROM user_tbl u INNER JOIN account_tbl b ON u.user_id = b.user_id WHERE u.user_id  = ?");
$stmt->execute([$_SESSION["user_id"]]);

if ($stmt) {
    $DataQrUSD = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($DataQrUSD);
}else {
    echo json_encode(array("error" => "Query failed"));
}
