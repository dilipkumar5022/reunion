<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// Get JSON data from POST
$data = json_decode(file_get_contents("php://input"), true);

// Set static mobile ID
$mobile_id = "8179145022";

// Check if cart_data exists
$cartData = $data['cart_data'] ?? [];

if (empty($cartData)) {
    echo json_encode(["success" => false, "message" => "Cart data is missing"]);
    exit;
}

// Insert each item into the orders table
foreach ($cartData as $item) {
    $product_id = $item['product_id'] ?? null;
    $quantity = $item['quantity'] ?? null;
    $count = $item['count'] ?? null;

    if (!$product_id || !$quantity || !$count) {
        echo json_encode(["success" => false, "message" => "Invalid item data"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO orders_details (mobile_id, product_id, quantity, count) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Prepare failed"]);
        exit;
    }

    $stmt->bind_param("sssi", $mobile_id, $product_id, $quantity, $count);

    if (!$stmt->execute()) {
        echo json_encode(["success" => false, "message" => "Insert failed for product_id: $product_id"]);
        $stmt->close();
        exit;
    }

    $stmt->close();
}

echo json_encode(["success" => true, "message" => "Order placed successfully"]);
$conn->close();
?>