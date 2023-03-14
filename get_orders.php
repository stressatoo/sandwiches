<?php
ini_set('display_errors', 1);

// connette al database
$host = "localhost";
$username = "paninarofix";
$password = "panini54321";
$dbname = "school_orders";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// ottiene gli ordini dal database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// crea un vettore per tenere gli ordini
$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

// interrompe la connessione al database
$conn->close();

// restituisce gli ordini come JSON
echo json_encode($orders);
?>