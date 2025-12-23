<?php
session_start();
header('Content-Type: application/json');

$mobile = "8179145022";
$count = 1;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);
$id = $input['id'] ?? null;
$chi = $input['chi'] ?? null;

// Database connection
$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

if ($id && $chi === 'fav_add_cart') {
    $quantity = "250";

    $stmt = $conn->prepare("INSERT INTO cart (mobile, product_id, quantity, count) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sisi", $mobile, $id, $quantity, $count);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode(['success' => $success]);
} elseif ($id && $chi === 'add_cart') {
    $quantity = $input['quantity'] ?? null;

    if ($quantity === null) {
        echo json_encode(['success' => false, 'message' => 'Quantity is required']);
        $conn->close();
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO cart (mobile, product_id, quantity, count) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sisi", $mobile, $id, $quantity, $count);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode(['success' => $success]);
}
 else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}

$conn->close();