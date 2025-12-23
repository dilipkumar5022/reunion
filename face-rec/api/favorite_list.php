<?php
session_start();

// Session hardening
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
session_regenerate_id(true);
header("Content-Type: application/json");

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header("Content-Security-Policy: default-src 'self';");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['mobile']) || !isset($input['csrf_token']) || $input['csrf_token'] !== $_SESSION['csrf_token']) {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}

$mobile = $_SESSION['mobile'];
$conn = new mysqli("localhost", "root", "", "pickels");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

$sql = "
    SELECT p.id, p.name, p.price, p.image, p.description,f.id as fid
    FROM favorites f
    JOIN pickles_info p ON f.product_id = p.id
    WHERE f.mobile = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();

$favorites = [];
while ($row = $result->fetch_assoc()) {
    $favorites[] = $row;
}

echo json_encode(["success" => true, "favorites" => $favorites]);

$stmt->close();
$conn->close();