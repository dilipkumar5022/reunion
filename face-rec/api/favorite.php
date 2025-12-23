<?php
session_start();
header('Content-Type: application/json');

// ✅ Step 1: Verify POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// ✅ Step 2: Check if user is logged in
if (!isset($_SESSION['mobile'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized access"]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);
$mobile = $_SESSION['mobile'];
$productId = $input['id'] ?? null;
$quantity = $input['quantity'] ?? null;

// ✅ Step 3: Validate product ID
if (!$productId) {
    echo json_encode(["success" => false, "message" => "Product ID missing"]);
    exit;
}

// ✅ Step 4: Connect to DB
$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// ✅ Step 5: Add to Cart or Favorites
if ($quantity !== null && $quantity !== "") {
    // 🛒 Add to cart (no duplicate check)
    $stmt = $conn->prepare("INSERT INTO cart (mobile, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $mobile, $productId, $quantity);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode([
        "success" => $success,
        "message" => $success ? "✅ Added to cart" : "❌ Cart insert failed"
    ]);
} else {
    // ❤️ Add to favorites (only if not already exists)
    $check = $conn->prepare("SELECT id FROM favorites WHERE mobile = ? AND product_id = ?");
    $check->bind_param("si", $mobile, $productId);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "❗ Already in favorites"]);
    } else {
        $stmt = $conn->prepare("INSERT INTO favorites (mobile, product_id) VALUES (?, ?)");
        $stmt->bind_param("si", $mobile, $productId);
        $success = $stmt->execute();
        $stmt->close();

        echo json_encode([
            "success" => $success,
            "message" => $success ? "✅ Added to favorites" : "❌ Favorite insert failed"
        ]);
    }

    $check->close();
}

$conn->close();