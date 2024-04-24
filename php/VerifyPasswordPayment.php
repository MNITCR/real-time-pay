<?php
require_once "./conn.php";

session_start();

header('Content-Type: application/json');
$user_id = $_SESSION['user_id'];
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    

    // Find receiver's account
    $stmt = $conn->prepare("SELECT user_id, password_four FROM password_four_tbl WHERE user_id = ? AND password_four = ?");
    $stmt->execute([$user_id, $password]);
    $verify = $stmt->fetch(PDO::FETCH_ASSOC);

    if($verify){
        $response["message"] = "success";
    }else{
        $response["message"] = "error";
    }
}
// Send the response back as JSON
echo json_encode($response);
