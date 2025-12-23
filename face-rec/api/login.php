<?php
include 'session_secure.php';
include '../db.php';

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header("Content-Security-Policy: default-src 'self';");

$data = json_decode(file_get_contents('php://input'), true);
$mobile = trim($data['mobile'] ?? '');
$password = $data['password'] ?? '';
$csrf_token = $data['csrf_token'] ?? '';
$ip_address = $_SERVER['REMOTE_ADDR'];

$response = ['success' => false, 'message' => ''];

// CSRF Token Validation
if (!isset($_SESSION['csrf_token']) || $csrf_token !== $_SESSION['csrf_token']) {
    $response['message'] = 'Invalid request';
    echo json_encode($response);
    exit;
}

// Mobile validation
if (!preg_match('/^[6-9]\d{9}$/', $mobile)) {
    $response['message'] = 'Invalid mobile format';
    echo json_encode($response);
    exit;
}

// Basic IP-based rate limiting
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = [];
}
if (!isset($_SESSION['login_attempts'][$ip_address])) {
    $_SESSION['login_attempts'][$ip_address] = 0;
}
$_SESSION['login_attempts'][$ip_address]++;
if ($_SESSION['login_attempts'][$ip_address] > 5) {
    $response['message'] = 'Too many login attempts. Try again later.';
    echo json_encode($response);
    exit;
}

// Verify user credentials
$sql = "SELECT * FROM user WHERE mobile = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['mobile'] = $mobile;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login_attempts'][$ip_address] = 0;

        $response['success'] = true;
        $response['message'] = 'Login successful';
    } else {
        $response['message'] = 'Invalid credentials';
    }
} else {
    $response['message'] = 'Invalid credentials';
}

echo json_encode($response);