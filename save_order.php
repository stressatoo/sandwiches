<?php
$host = "localhost";
$username = "paninaro";
$password = "TrKbx8MHkHqC8!Kv";
$dbname = "school_orders";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$studentClass = $_POST["student-class"];
$studentSandwich = $_POST["student-sandwich"];

$sql = "INSERT INTO orders (student_class, sandwich) VALUES ('$studentClass', '$studentSandwich')";

if (mysqli_query($conn, $sql)) {
  echo "Order saved!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
