<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

$id = $input['id'] ?? null;
$chi = $input['chi'] ?? null;

if (!$id || $chi !== 'fav_delete' || !isset($_SESSION['mobile'])) {
    echo json_encode(['success' => false, 'message' => 'Missing data or unauthorized']);
    exit;
}

$conn = new mysqli("localhost", "root", "", "pickels");

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM favorites WHERE id = ? AND mobile = ?");
$stmt->bind_param("is", $id, $_SESSION['mobile']);
$success = $stmt->execute();

echo json_encode(['success' => $success]);

$stmt->close();
$conn->close();