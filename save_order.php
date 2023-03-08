<?php
error_reporting(E_ALL);

if (!isset($_POST['class-select']) && !isset($_POST['sandwich-select'])) {
    http_response_code(400);
    die('Error: missing form fields.');
}

// get the selected class and sandwich from the request
$class = $_POST['class-select'];
$sandwich = $_POST['sandwich-select'];

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
if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit();
}

$stmt->bind_param("ss", $class, $sandwich);
if (!$stmt->execute()) {
    http_response_code(500);
    die("Error saving order: " . $stmt->error);
}

$stmt->execute();

// close the database connection
$conn->close();
?>
