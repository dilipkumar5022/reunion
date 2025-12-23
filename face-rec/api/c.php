<?php
session_start();
if (!isset($_SESSION['mobile'])) {
    header("Location: login.php");
    exit;
}

// Database connection (update with your credentials)
$host = 'localhost';
$db = 'pickels';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mobile = $_SESSION['mobile'];

$sql = "SELECT 
            c.product_id, 
            c.quantity, 
            p.name, 
            p.description, 
            p.image AS img,
            pr.price 
        FROM cart c
        JOIN pickles_info p ON c.product_id = p.id
        JOIN price pr ON c.product_id = pr.product_id AND c.quantity = pr.quantity
        WHERE c.mobile = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart Items</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }
        img {
            width: 100px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Cart Items</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity (g)</th>
                <th>Price (₹)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['product_id']) ?></td>
                <td><img src="../images/<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>"></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['quantity']) ?></td>
                <td>₹<?= htmlspecialchars($row['price']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>