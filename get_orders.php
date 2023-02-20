<?php

ini_set('display_errors', 1);

// set up database connection
$host = "localhost";
$username = "paninarofix";
$password = "panini54321";
$dbname = "school_orders";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

var_dump($dbname);

// prepare and execute the SQL statement to get all orders from the database
$result = $conn->query("SELECT * FROM orders");
$orders = array();
if ($result->num_rows > 0) {
    // fetch each row and add it to the orders array
    while ($row = $result->fetch_assoc()) {
        $orders[] = array("class" => $row["class"], "sandwich" => $row["sandwich"]);
    }
}

// close the database connection
$conn->close();

// output the orders array as JSON
header("Content-Type: application/json");
echo json_encode($orders);
?>