<?php
require_once "./conn.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    // User not logged in, handle appropriately
    exit(json_encode(["success" => false, "message" => "User not logged in"]));
}

header('Content-Type: application/json');
$user_id = $_SESSION['user_id'];

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userName'])) {
    // Extract the userName from the POST data
    $userName = $_POST['userName'];

    // Fetch user data from the database with FETCH_ASSOC fetch style
    $stmt = $conn->prepare("SELECT first_name, last_name FROM user_tbl WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Concatenate the first and last names
    $fullName = $user["first_name"] . $user["last_name"];

    if ($fullName === $userName) {
        $_SESSION['logged_in'] = true;
        $response['success'] = true;
        $response['message'] = "Data received successfully!";
    } else {
        $_SESSION['logged_in'] = false;
        $response['success'] = false;
        $response['message'] = "Data mismatch!";
    }
} else {
    // If data is not received, return an error message
    $response['success'] = false;
    $response['message'] = "Data not received.";
}

// Send the response back as JSON
echo json_encode($response);
