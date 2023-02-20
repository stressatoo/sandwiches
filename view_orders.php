<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Class</th>
                <th>Sandwich</th>
            </tr>
        </thead>
        <tbody id="orders"></tbody>
    </table>
    <script src="view_orders.js"></script>
</body>
</html>
