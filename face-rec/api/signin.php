<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

require_once 'secure_session.php';
require_once 'crf_token.php';
require_once '../db.php';

secure_session_start();

if (!isset($_SESSION['signup_attempts'])) {
    $_SESSION['signup_attempts'] = 0;
}
$_SESSION['signup_attempts']++;
if ($_SESSION['signup_attempts'] > 5) {
    echo json_encode(["success" => false, "message" => "Too many attempts. Try again later."]);
    exit;
}

// Get raw input
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid JSON"]);
    exit;
}

// CSRF check
if (!isset($data['csrf_token']) || !verify_csrf_token($data['csrf_token'])) {
    echo json_encode(["success" => false, "message" => "Invalid CSRF token"]);
    exit;
}

// Required fields check
if (!isset($data['name'], $data['mobile'], $data['password'])) {
    echo json_encode(["success" => false, "message" => "Missing fields"]);
    exit;
}

// Sanitize
$name = htmlspecialchars(trim($data['name']));
$mobile = htmlspecialchars(trim($data['mobile']));
$password = $data['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check existing user
$stmt = $conn->prepare("SELECT id FROM user WHERE mobile = ?");
$stmt->bind_param("s", $mobile);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Mobile already registered"]);
    exit;
}
$stmt->close();

// Insert
$stmt = $conn->prepare("INSERT INTO user (name, mobile, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $mobile, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Signup failed"]);
}
$stmt->close();
$conn->close();
?>