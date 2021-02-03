<?php
$servername = "82.223.113.23";
$username = "qadt464";
$password = "StEvQa39";
$dbName = "qadt464";
// //local = 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbName = "proyecto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>