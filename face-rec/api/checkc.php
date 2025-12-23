<?php

header('Content-Type: application/json');

// Connect to database
$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// Get incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Simulate session or set a default mobile number
$mobileNumber = '8179145022'; // You can replace this with $_SESSION['mobile'] if needed
$cartData = $data['cart_data'] ?? [];

if (empty($mobileNumber) || empty($cartData)) {
    echo json_encode(["success" => false, "message" => "Missing mobile number or cart data"]);
    exit;
}

foreach ($cartData as $item) {
    $id = $item['id'] ?? null;
    $quantity = $item['quantity'] ?? null;
    $count = $item['count'] ?? null;

    if (!$id || !$quantity || !$count) {
        echo json_encode(["success" => false, "message" => "Incomplete item data"]);
        exit;
    }

    $sql = "UPDATE cart SET quantity = ?, count = ? WHERE id = ? AND mobile = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Failed to prepare statement"]);
        exit;
    }

    $stmt->bind_param("iiis", $quantity, $count, $id, $mobileNumber);
    if (!$stmt->execute()) {
        echo json_encode(["success" => false, "message" => "Update failed for ID: $id"]);
        $stmt->close();
        exit;
    }

    $stmt->close();
}

echo json_encode(["success" => true, "message" => "Cart updated successfully"]);
$conn->close();
?>