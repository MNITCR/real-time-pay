<?php
    // Create connection
    try {
        $conn = new PDO("mysql:host=localhost;port=3307;dbname=real_time_pay", "root", "");

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
