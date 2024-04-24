<?php
    include_once './php/conn.php';
    $user_id = 3;

    $stmt = $conn->prepare("SELECT user_id, account_id, account_number_eg, account_number_kh, balance_eg, balance_kh FROM account_tbl WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $sender = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($sender["account_id"]);
