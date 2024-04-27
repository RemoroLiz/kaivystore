<?php
// koneksi.php
$host = 'localhost';
$dbname = 'id22058446_kaivygame';
$username = 'root';
$password = ']t7\VxO7Wz%>j=K=';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    die(); // hentikan eksekusi jika gagal terhubung
}
?>