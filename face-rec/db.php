<?php
$servername = "localhost";
$username = "root";  // change if needed
$password = "";      // change if needed
$dbname = "pickels"; // replace with your actual DB name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>