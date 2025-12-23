<?php
session_start();
if (!isset($_SESSION['mobile'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $conn = new mysqli("localhost", "root", "", "pickels");

    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed"]);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND mobile = ?");
    $stmt->bind_param("is", $id, $_SESSION['mobile']);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete item"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>