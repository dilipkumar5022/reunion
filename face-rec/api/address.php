<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "pickels");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// Check request method
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // INSERT address logic
    $data = $_POST;
    if (!$data) {
        echo json_encode(["success" => false, "message" => "No data received"]);
        exit;
    }

    $mobile_id = '8179145022';
    $name = $data['name'] ?? '';
    $mobile = $data['mobile'] ?? '';
    $pincode = $data['pincode'] ?? '';
    $locality = $data['locality'] ?? '';
    $address = $data['address'] ?? '';
    $city = $data['city'] ?? '';
    $state = $data['state'] ?? '';
    $landmark = $data['landmark'] ?? '';
    $altPhone = $data['altPhone'] ?? '';

    $sql = "INSERT INTO addresses (name, mobile_id, mobile, pincode, locality, address, city, state, landmark, alt_phone)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssssss", $name, $mobile_id, $mobile, $pincode, $locality, $address, $city, $state, $landmark, $altPhone);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Address added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add address", "error" => $stmt->error]);
    }
    $stmt->close();
}

elseif ($method === 'GET') {
    // FETCH address logic
    $mobile_id = '8179145022';

    $sql = "SELECT id, name, mobile, address, city, state, pincode FROM addresses WHERE mobile_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mobile_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $addresses = [];
    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row;
    }

    echo json_encode(["success" => true, "data" => $addresses]);
    $stmt->close();
}
elseif ($method === 'DELETE') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM addresses WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Address deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete address", "error" => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "No ID provided"]);
    }
}
$conn->close();
?>