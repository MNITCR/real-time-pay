<?php
require_once "./conn.php";
session_start();

// Fetch data from the database
$stmt = $conn->prepare("SELECT user_id, balance_r_d, sender, receiver, amount, description, status FROM payment_tbl WHERE user_id = ? LIMIT 7");
$stmt->execute([$_SESSION["user_id"]]);

// Fetch all rows
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Calculate total pages
$totalRows = count($rows);
$rowsPerPage = 7; // Adjust as needed
$totalPages = ceil($totalRows / $rowsPerPage);

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($rows);
