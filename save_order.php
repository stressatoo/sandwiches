<?php
$db = new mysqli("host", "username", "password", "school_orders");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$studentClass = $_POST["student-class"];
$studentSandwich = $_POST["student-sandwich"];

$sql = "INSERT INTO orders (student_class, sandwich) VALUES (?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $studentClass, $studentSandwich);
$stmt->execute();

echo "Ordine salvato!";
?>