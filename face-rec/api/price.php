<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "pickels");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

$sql = "SELECT id, price1, price2, price3 FROM pickles_info_p";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(["success" => true, "data" => $data]);
} else {
    echo json_encode(["success" => false, "message" => "No records found"]);
}

$conn->close();
?>