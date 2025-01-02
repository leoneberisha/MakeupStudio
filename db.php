<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Gabim në lidhje me databazën: " . $conn->connect_error);
} 
?>

