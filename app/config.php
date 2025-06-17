<?php
$host = "localhost";
$db = "webapp";
$user = "root";
$pass = "111";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>