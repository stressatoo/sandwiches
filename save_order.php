<?php
error_reporting(E_ALL);

if (!isset($_POST['class-select']) && !isset($_POST['sandwich-select'])) {
    http_response_code(400);
    die('Error: missing form fields.');
}

// ottiene la classe e il panino dalla richiesta
$class = $_POST['class-select'];
$sandwich = $_POST['sandwich-select'];

// imposta la connessione al database
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

// prepara ed esegue l'istruzione SQL per inserire l'ordine dentro il database
$stmt = $conn->prepare("INSERT INTO orders (`student_class`, sandwich) VALUES (?, ?)");
if (!$stmt) {
    echo "Errore: " . $conn->error;
    exit();
}

$stmt->bind_param("ss", $class, $sandwich);
if (!$stmt->execute()) {
    http_response_code(500);
    die("Errore nel salvataggio dell'ordine: " . $stmt->error);
}

$stmt->execute();

// interrompe la connessione al database
$conn->close();
?>
