<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pickels";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$mobile_id = '8179145022';

$sql = "SELECT o.order_id, o.quantity, o.amount, o.count, o.product_id, o.status, o.create_date,
               p.name AS product_name, p.description AS product_description, p.image AS product_image
        FROM orders o
        JOIN pickles_info p ON o.product_id = p.id
        WHERE o.mobile_id = ?
        ORDER BY o.create_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mobile_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];

while ($row = $result->fetch_assoc()) {
    $orders[] = [
        "order_id" => $row['order_id'],
        "product_id" => $row['product_id'],
        "quantity" => $row['quantity'],
        "count" => $row['count'],
        "amount" => $row['amount'],
        "status" => (int)$row['status'],
        "create_date" => $row['create_date'],
        "product" => [
            "name" => $row['product_name'],
            "description" => $row['product_description'],
            "image" => $row['product_image']
        ]
    ];
}

$stmt->close();
$conn->close();

echo json_encode(["orders" => $orders]);