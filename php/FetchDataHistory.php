<?php
    require_once "./conn.php";
    session_start();

    // Fetch all data
    $stmt = $conn->prepare("SELECT user_id, balance_r_d, sender, receiver, amount, description, status,payment_date FROM payment_tbl WHERE user_id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return all data as JSON
    header('Content-Type: application/json');
    echo json_encode($rows);
