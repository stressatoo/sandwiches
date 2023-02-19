<?php
$host = "localhost";
$username = "paninaro";
$password = "TrKbx8MHkHqC8!Kv";
$dbname = "school_orders";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
  $orders[] = $row;
}

echo json_encode($orders);

mysqli_close($conn);
?>
