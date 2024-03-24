<?php
require_once("./conn.php");

$response = array();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accountId"])) {
    $accountId = $_POST["accountId"];

    $stmt = $conn->prepare("DELETE FROM history_accnum_tbl WHERE history_accNum_id = ?");
    $stmt->execute([$accountId]);

    if ($stmt) {
        $response['message'] = "Record deleted successfully.";
    } else {
        $response['message'] = "Error deleting record.";
    }
} else {
    $response['message'] = "Invalid request.";
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
