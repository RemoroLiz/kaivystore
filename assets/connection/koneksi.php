<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "kaivy";

// Membuat koneksi
$conn = new mysqli($server, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>