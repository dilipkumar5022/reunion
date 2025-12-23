<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);



$mobile = $_SESSION['mobile'];
$productId = $input['id'] ?? null;
$quantity = $input['quantity'] ?? null;

if (!$productId) {
    echo json_encode(["success" => false, "message" => "Product ID missing"]);
    exit;
}

$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "DB connection failed"]);
    exit;
}

if ($quantity !== null && $quantity !== "") {
    // Add to cart
    $stmt = $conn->prepare("INSERT INTO cart (mobile, product_id, quantity)
        VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity");
    $stmt->bind_param("ssi", $mobile, $productId, $quantity);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode(["success" => $success, "message" => $success ? "Added to cart" : "Cart update failed"]);
} else {
    // Add to favorite
    $check = $conn->prepare("SELECT id FROM favorites WHERE mobile = ? AND product_id = ?");
    $check->bind_param("ss", $mobile, $productId);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Already in favorites"]);
    } else {
        $stmt = $conn->prepare("INSERT INTO favorites (mobile, product_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $mobile, $productId);
        $success = $stmt->execute();
        echo json_encode(["success" => $success, "message" => $success ? "Added to favorites" : "Favorite insert failed"]);
        $stmt->close();
    }
    $check->close();
}

$conn->close();