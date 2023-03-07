<?php
error_reporting(E_ALL);

// get the selected class and sandwich from the request
$class = $_POST['student_class'];
$sandwich = $_POST['sandwich'];

// set up database connection
$host = "localhost";
$username = "paninarofix";
$password = "panini54321";
$dbname = "school_orders";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

var_dump($_POST);
var_dump($dbname);

// prepare and execute the SQL statement to insert the order into the database
$stmt = $conn->prepare("INSERT INTO orders (`student_class`, sandwich) VALUES (?, ?)");
$stmt->bind_param("ss", $class, $sandwich);
$stmt->execute();

// close the database connection
$conn->close();
?>
