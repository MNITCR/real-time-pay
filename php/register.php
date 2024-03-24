<?php
session_start();
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the "image" key exists in the $_FILES array
    if (isset($_FILES["image"])) {
        // Function to generate a random token
        function generateToken($length = 32)
        {
            return bin2hex(random_bytes($length));
        }

        // Function to generate expiration date (30 days from now)
        function generateExpirationDate()
        {
            return date('Y-m-d', strtotime('+30 days'));
        }

        // Generate token
        $token = generateToken();

        // Generate expiration date
        $tokenExp = generateExpirationDate();

        // Extract form data
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // generate qr code url
        $dataUser = array(
            "firstName" => $firstName,
            "lastName" => $lastName,
            "phone" => $phone,
            "email" => $email
        );

        $json_data = json_encode($dataUser);
        $qrCodeUrl = urlencode($json_data);

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Handle image upload
        $targetDir = "../asset/uploads/"; // Directory where uploaded images will be stored
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) { // Adjust size limit as needed
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        //     echo "Sorry, your file was not uploaded.";
        // } else { // If everything is ok, try to upload file
        //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        //         echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        //     } else {
        //         echo "Sorry, there was an error uploading your file.";
        //     }
        // }

        // Validate form data (perform server-side validation)
        if ($firstName === "" || $lastName === "" || $password === "" || $email === "" || $phone === "") {
            echo "Please enter all required fields";
        } else {
            include_once("./conn.php");

            // Check if user already exists
            $stmt = $conn->prepare("SELECT email, phone FROM user_tbl WHERE email = ? OR phone = ?");
            $stmt->execute([$email, $phone]);
            $user = $stmt->fetch();


            if (!$user) {
                // Generate account numbers using time and random number
                $timestamp = time();
                $random_eg = mt_rand(191387, 906254);
                $random_kh = rand(243195, 942157);
                $account_number_eg = substr($timestamp, -6, 3) . $random_eg;
                $account_number_kh = $random_kh . substr($timestamp, -3, 3);

                // Insert user data into the database
                $stmt = $conn->prepare("INSERT INTO user_tbl (first_name, last_name, phone, email, password, image_path, created_at, token, tokenExp, qrcode) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)");
                $stmt->execute([$firstName, $lastName, $phone, $email, $hashedPassword, $targetFile, $token, $tokenExp, $qrCodeUrl]);

                if ($stmt) {
                    // Retrieve the last inserted user_id
                    $user_id = $conn->lastInsertId();

                    $stmt = $conn->prepare("INSERT INTO account_tbl (user_id, account_number_eg, account_number_kh, created_at) VALUES (?, ?, ?, NOW())");
                    $stmt->execute([$user_id, $account_number_eg, $account_number_kh]);
                    $_SESSION["token"] = $token;
                    echo "success";
                } else {
                    echo "Registration not successful!";
                }
            } else {
                echo "User already registered";
            }
        }
    } else {
        // If "image" key is not present in $_FILES array
        echo "No image uploaded.";
    }
} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method.";
}
