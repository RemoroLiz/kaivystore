<?php
// check_game_name.php
include 'koneksi.php'; // File untuk koneksi ke database

// Periksa jika ada permintaan AJAX dengan parameter 'game_name'
if(isset($_POST['game_name'])) {
    $game_name = $_POST['game_name'];
    // Buat query untuk memeriksa nama game di database
    $stmt = $pdo->prepare("SELECT * FROM tb_listgame WHERE game_name = ?");
    $stmt->execute([$game_name]);
    if($stmt->rowCount() > 0) {
        echo "exists"; // Nama game sudah ada
    } else {
        echo "not_exists"; // Nama game belum ada
    }
}
?>