<?php
require_once "./conn.php";

session_start();

header('Content-Type: application/json');
$user_id = $_SESSION['user_id'];

$response = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST["accountNumber"];
    $balance = floatval($_POST["balance"]);
    $amount = floatval($_POST["amount"]);
    $description = $_POST["description"];
    $checkBalance = $_POST["check"];


    // Find receiver's account
    $stmt = $conn->prepare("SELECT user_id, account_number_eg, account_number_kh, balance_eg, balance_kh FROM account_tbl WHERE account_number_eg = ? OR account_number_kh = ?");
    $stmt->execute([$accountNumber, $accountNumber]);
    $receiver = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($receiver !== false) {
        if ($receiver["user_id"] === $user_id) {
            $response["message"] = "You can't transfer to your own account.";
        } else {
            // Find sender's account
            $stmt = $conn->prepare("SELECT user_id, account_number_eg, account_number_kh, balance_eg, balance_kh FROM account_tbl WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $sender = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($sender) {
                // Determine sender's and receiver's balance columns
                $senderBalanceColumn = ($checkBalance === 'true') ? 'balance_eg' : 'balance_kh';
                $receiverBalanceColumn = ($receiver['account_number_eg'] == $accountNumber) ? 'balance_eg' : 'balance_kh';

                // Check if sender's balance is sufficient
                $updatedBalanceSender = $sender[$senderBalanceColumn] - $amount;

                // echo $senderBalanceColumn;
                if ($updatedBalanceSender >= 0) {
                    // Update sender's balance
                    $updateStmtSender = $conn->prepare("UPDATE account_tbl SET $senderBalanceColumn = ? WHERE user_id = ?");
                    $updateStmtSender->execute([$updatedBalanceSender, $user_id]);

                    // Get sender's full name
                    $senderNameStmt = $conn->prepare("SELECT first_name, last_name FROM user_tbl WHERE user_id = ?");
                    $senderNameStmt->execute([$user_id]);
                    $senderName = $senderNameStmt->fetch(PDO::FETCH_ASSOC);
                    $senderFullName = $senderName['first_name'] . ' ' . $senderName['last_name'];

                    // Get receiver's full name
                    $receiverNameStmt = $conn->prepare("SELECT first_name, last_name FROM user_tbl WHERE user_id = ?");
                    $receiverNameStmt->execute([$receiver["user_id"]]);
                    $receiverName = $receiverNameStmt->fetch(PDO::FETCH_ASSOC);
                    $receiverFullName = $receiverName['first_name'] . ' ' . $receiverName['last_name'];

                    // Update receiver's balance
                    $updatedBalanceReceiver = $receiver[$receiverBalanceColumn] + $amount;
                    $updateStmtReceiver = $conn->prepare("UPDATE account_tbl SET $receiverBalanceColumn = ? WHERE account_number_eg = ? OR account_number_kh = ?");
                    $updateStmtReceiver->execute([$updatedBalanceReceiver, $accountNumber, $accountNumber]);

                    // Insert data to history table
                    $historyStmt = $conn->prepare("INSERT INTO history_accnum_tbl (user_id, account_number, user_name, history_accNum_date, created_at) VALUES (?, ?, ?, NOW(), NOW())");
                    $historyStmt->execute([$user_id, $accountNumber, $receiverFullName]);
                    $lastInsertedHistoryId = $conn->lastInsertId(); // Get the last inserted ID

                    // Insert data to payment table
                    $status = "success"; // Assuming payment is successful
                    $paymentStmt = $conn->prepare("INSERT INTO payment_tbl (user_id, account_id, sender, receiver, account_number, description, amount, payment_date, status, balance_r_d) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
                    $paymentStmt->execute([$user_id, $lastInsertedHistoryId, $senderFullName, $receiverFullName, $accountNumber, $description, $amount, $status, $senderBalanceColumn]);

                    $response["message"] = "Payment submitted successfully.";
                } else {
                    $response["message"] = "Insufficient balance.";
                }
            } else {
                $response["message"] = "Invalid sender account.";
            }
        }
    } else {
        $response["message"] = "Invalid receiver account number.";
    }
}

// Send the response back as JSON
echo json_encode($response);
