<?php
ini_set('display_errors', 1);

// get the database connection
$host = "localhost";
$username = "paninarofix";
$password = "panini54321";
$dbname = "school_orders";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve orders from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// create an array to hold the orders
$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

// close the database connection
$conn->close();

// return the orders as JSON
echo json_encode($orders);
?>