<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

$mobile = '8179145022';

$sql = "SELECT 
            c.id,
            c.product_id, 
            c.quantity, 
            c.count,
            p.name, 
            p.description, 
            p.image,
            pr.price,
            pp.price1,
            pp.price2,
            pp.price3
        FROM cart c
        JOIN pickles_info p ON c.product_id = p.id
        JOIN price pr ON c.product_id = pr.product_id AND c.quantity = pr.quantity
        LEFT JOIN pickles_info_p pp ON p.id = pp.id
        WHERE c.mobile = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "p_id" => $row['id'],
        "product_id" => $row['product_id'],
        "name" => $row['name'],
        "description" => $row['description'],
        "image" => $row['image'],
        "price" => $row['price'],
        "quantity" => $row['quantity'],
        "count"=>$row['count'],
        "price1" => $row['price1'],
        "price2" => $row['price2'],
        "price3" => $row['price3']
    ];
}

echo json_encode(["success" => true, "data" => $data]);

$stmt->close();
$conn->close();
?>