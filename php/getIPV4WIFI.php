<?php
// Execute ipconfig command and capture output
$output = shell_exec('ipconfig /all');

// Find the section for "Wireless LAN adapter Wi-Fi"
$lines = explode("\n", $output);
$ipv4Address = '';
$found = false;
$array = array();
foreach ($lines as $line) {
    if (strpos($line, 'Wireless LAN adapter Wi-Fi') !== false) {
        $found = true;
        continue; // Skip the header line
    }
    if ($found) {
        // Check for the line containing IPv4 address
        if (strpos($line, 'IPv4 Address') !== false) {
            // Extract the IPv4 address
            preg_match('/\d+\.\d+\.\d+\.\d+/', $line, $matches);
            if (!empty($matches)) {
                $ipv4Address = $matches[0];
                break; // Exit loop once IPv4 address is found
            }
        }
    }
}

// Prepare response in JSON format
$response = array();
if (!empty($ipv4Address)) {
    $response['success'] = $ipv4Address;
} else {
    $response['error'] = "IPv4 Address not found for Wireless LAN adapter Wi-Fi";
}

// Encode response as JSON and output
echo json_encode($response);
