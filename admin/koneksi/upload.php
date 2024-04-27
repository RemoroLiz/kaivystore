<?php
// upload_game.php
include 'koneksi.php'; // File untuk koneksi ke database

// Periksa jika form telah disubmit
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Gunakan htmlspecialchars() untuk mencegah XSS pada input pengguna
    $game_name = htmlspecialchars($_POST['game_name']);
    $publisher_name = htmlspecialchars($_POST['publisher_name']);
    $img_game = $_FILES['img_game'];

    // Validasi input dan file upload di sini...

    // Pemeriksaan nama game di database
    $stmt = $pdo->prepare("SELECT * FROM tb_listgame WHERE game_name = ?");
    $stmt->execute([$game_name]);
    if($stmt->rowCount() > 0) {
        echo "<script>alert('Nama game sudah tersedia'); window.location.href = './input-game.php';</script>";
    } else {
        // Proses upload gambar
        $target_directory = "kaivygame/assets/img/game/";

        // Generate nama file acak
        $random_filename = uniqid() . "." . strtolower(pathinfo($img_game["name"], PATHINFO_EXTENSION));

        // Hanya simpan nama file acak, tanpa path absolut
        $target_file = $random_filename;

        $check = getimagesize($img_game["tmp_name"]);
        if($check !== false) {
            if(move_uploaded_file($img_game["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . $target_directory . $target_file)) {
                // Masukkan data ke dalam database
                $sql = "INSERT INTO tb_listgame (game_name, publisher_name, img_game) VALUES (?, ?, ?)";
                $pdo->prepare($sql)->execute([$game_name, $publisher_name, $target_file]);

                // Redirect ke halaman index dengan pesan sukses
                echo "<script>alert('Data berhasil disimpan!'); window.location.href = './input-game.php';</script>";
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat upload gambar.'); window.location.href = './input-game.php';</script>";
            }
        } else {
            echo "<script>alert('File bukan gambar.'); window.location.href = './input-game.php';</script>";
        }
    }
}
?>
