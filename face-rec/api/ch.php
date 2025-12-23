<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['mobile'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

$mobile = $_SESSION['mobile'];
$productId = $input['id'] ?? null;
$quantity = $input['quantity'] ?? null;
$count = "1";
if (!$productId || !$quantity) {
    echo json_encode(["success" => false, "message" => "Product ID and Quantity are required"]);
    exit;
}

$conn = new mysqli("localhost", "root", "", "pickels");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// Insert the product into the cart table
$stmt = $conn->prepare("INSERT INTO cart (mobile, product_id, quantity, count) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssi", $mobile, $productId, $quantity,$count);


$success = $stmt->execute();
$stmt->close();
$conn->close();

echo json_encode(["success" => $success, "message" => $success ? "Product added to cart" : "Failed to add product to cart"]);
?>