<?php
$servername = "localhost";
$username = "root";       // Default for XAMPP
$password = "";           // Default for XAMPP
$database = "feedback";   // Your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
