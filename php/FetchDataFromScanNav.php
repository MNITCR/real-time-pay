<?php
require_once "./conn.php";
// session_start();
header('Content-Type: application/json');

$response = array();

// $user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['data'])) {
    $dataScanNav_json = $_POST['data'];

    // Decode the JSON string
    $credential = json_decode($dataScanNav_json, true);
    $user_id = $credential["user_id"];

    // Fetch user data from the database with FETCH_ASSOC fetch style
    $stmt = $conn->prepare("SELECT u.user_id, u.first_name, u.last_name,
    u.token, b.user_id, b.account_number_eg, b.account_number_kh
    FROM user_tbl u INNER JOIN account_tbl b ON
    u.user_id = b.user_id WHERE u.user_id  = ?");

    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Compare data
    if (
        $credential["first_name"] === $user["first_name"] &&
        $credential["last_name"] === $user["last_name"] &&
        $user["token"] === $user["token"] &&
        $credential["account_number_eg"] === $user["account_number_eg"] &&
        $credential["account_number_kh"] === $user["account_number_kh"]
    ) {
        $response['success'] = "Successfully!";
    } else {
        $response['message'] = "User not found!";
    }
} else {
    $response['message'] = "Error: Data not received.";
}

// Output the response as JSON
echo json_encode($response);
