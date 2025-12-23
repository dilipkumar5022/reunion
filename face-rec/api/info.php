<?php
header('Content-Type: application/json');

// Connect to database
$conn = new mysqli("localhost", "root", "", "pickels");

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit();
}

// Set mobile number
$mobile = '8179145022';

// Check if it's a POST request for password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['id'] === 'check') {
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];

    $sql = "SELECT * FROM user WHERE mobile = '$mobile'";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        $hashedPassword = $row['password'];

        if (password_verify($oldPassword, $hashedPassword)) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $update = "UPDATE user SET password = '$newHashedPassword' WHERE id = " . $row['id'];
            if ($conn->query($update)) {
                echo json_encode(["status" => "success", "message" => "Password updated successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update password."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Old password is incorrect."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
} 
else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['id'] === 'checkk') {
    $oldPassword = $_POST['oldpasswordd'];
    $newPassword = $_POST['newpasswordd'];

    $sql = "SELECT * FROM user WHERE mobile = '$mobile'";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        $hashedPassword = $row['password'];

        if (password_verify($oldPassword, $hashedPassword)) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $update = "UPDATE user SET password = '$newHashedPassword' WHERE id = " . $row['id'];
            if ($conn->query($update)) {
                echo json_encode(["status" => "success", "message" => "Password updated successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update password."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Old password is incorrect."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
} 
// Else if it's a GET request to fetch user info
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT name, email, mobile FROM user WHERE mobile = '$mobile'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode([
            'name' => $row['name'],
            'email' => $row['email'],
            'mobile' => $row['mobile']
        ]);
    } else {
        echo json_encode([
            'name' => '',
            'email' => '',
            'mobile' => ''
        ]);
    }
}
?>