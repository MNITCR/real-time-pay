<?php
include_once("./conn.php");

session_start();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract form data
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Validate form data (perform server-side validation)
    if ($phone === "" || $password === "") {
        echo "Please enter both phone number and password.";
    } else {
        try {
            // Prepare SQL statement to fetch user by phone number
            $stmt = $conn->prepare("SELECT user_id, phone, password, token FROM user_tbl WHERE phone = :phone");
            $stmt->bindParam(":phone", $phone);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify if user exists and password is correct
            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["logged_in"] = true;
                $_SESSION["token"] = $user["token"];

                if (isset($_POST["remember"]) && $_POST["remember"] == "true") {
                    // Checkbox is checked, set cookies
                    setcookie("phone_number", $_POST["phone"], time() + (10 * 365 * 24 * 60 * 60), '/');
                    setcookie("user_password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60), '/');
                } else {
                    // Checkbox is not checked, clear cookies if they exist
                    if (isset($_COOKIE["phone_number"])) {
                        setcookie("phone_number", "", time() - 3600, '/');
                    }
                    if (isset($_COOKIE["user_password"])) {
                        setcookie("user_password", "", time() - 3600, '/');
                    }
                }
                echo "success";
            } else {
                echo "false";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    http_response_code(405);
    echo "Invalid request method.";
}
