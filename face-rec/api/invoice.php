<?php
// Set headers to return JSON data
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Get the orderId from the query string
$order_id = 'ORD001'; 

// SQL to fetch order details based on the orderId
$sql = "SELECT o.order_id, o.quantity, o.amount, o.count, o.product_id, o.status, o.create_date,
               p.name, p.description, p.image 
        FROM orders o
        JOIN pickles_info p ON o.product_id = p.id
        WHERE o.order_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$orderData = $result->fetch_assoc();

if ($orderData) {
    // Return the order details as JSON response
    echo json_encode($orderData);
} else {
    // If order is not found, return an error
    echo json_encode(["error" => "Order not found"]);
}

$stmt->close();
$conn->close();
?>