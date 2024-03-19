<?php
require_once "./conn.php";
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    // User not logged in, handle appropriately
    exit(json_encode(["success" => false, "message" => "User not logged in"]));
}

$response = array();

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['data'])) {
    $credential_json = $_POST['data'];

    // Decode the JSON string
    $credential = json_decode($credential_json, true);

    // Fetch user data from the database with FETCH_ASSOC fetch style
    $stmt = $conn->prepare("SELECT first_name, last_name, email, phone FROM user_tbl WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Compare data
    if (
        $credential["firstName"] === $user["first_name"] &&
        $credential["lastName"] === $user["last_name"] &&
        $credential["phone"] === $user["phone"] &&
        $credential["email"] === $user["email"]
    ) {
        // Authentication successful
        $_SESSION['logged_in'] = true;
        $response['success'] = true;
        $response['message'] = "Data received successfully!";
    } else {
        // Authentication failed
        $response['success'] = false;
        $response['message'] = "Invalid credentials";
    }
} else {
    // If data is not received, return an error message
    $response['success'] = false;
    $response['message'] = "Error: Data not received.";
}

// Output the response as JSON
echo json_encode($response);
