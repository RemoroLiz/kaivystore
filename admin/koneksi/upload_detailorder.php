<?php
// upload_game.php
include 'koneksi.php'; // File untuk koneksi ke database

if (isset($_POST['submit_dmlbb'])) {
    $kategori_dmlbb = $_POST['kategori_ml'];
    $jumlah_dmlbb = $_POST['jumlah_dmlbb'];
    $harga_dmlbb = $_POST['harga_dmlbb'];
    $img_dmlbb = $_FILES['img_dmlbb'];

    $target_directory = "kaivygame/assets/img/game/";
    $random_filename = uniqid() . "." . strtolower(pathinfo($img_dmlbb["name"], PATHINFO_EXTENSION));
    $target_file = $target_directory . $random_filename;

    $check = getimagesize($img_dmlbb["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($img_dmlbb["tmp_name"], $target_file)) {
            $sql = "INSERT INTO tb_dmlbb (kategori_dmlbb, jumlah_dmlbb, harga_dmlbb, img_dmlbb) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$kategori_dmlbb, $jumlah_dmlbb, $harga_dmlbb, $target_file]);

            echo "<script>alert('Data berhasil disimpan!'); window.location.href = './input-game.php';</script>";
            exit; // Pastikan untuk keluar setelah redirect
        } else {
            echo "<script>alert('Maaf, terjadi kesalahan saat upload gambar.'); window.location.href = './input-game.php';</script>";
            exit; // Pastikan untuk keluar setelah redirect
        }
    } else {
        echo "<script>alert('File bukan gambar.'); window.location.href = './input-game.php';</script>";
        exit; // Pastikan untuk keluar setelah redirect
    }
} elseif (isset($_POST['submit_dmff'])) {
    // Similar processing for tb_dmff
    if (isset($_POST['submit_dmff'])) {
        $kategori_ff = $_POST['kategori_ff'];
        $jumlah_dmff = $_POST['jumlah_dmff'];
        $harga_dmff = $_POST['harga_dmff'];
        $img_dmff = $_FILES['img_dmff'];
    
        $target_directory = "kaivygame/assets/img/game/";
        $random_filename = uniqid() . "." . strtolower(pathinfo($img_dmff["name"], PATHINFO_EXTENSION));
        $target_file = $target_directory . $random_filename;
    
        $check = getimagesize($img_dmff["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($img_dmff["tmp_name"], $target_file)) {
                $sql = "INSERT INTO tb_dmff (kategori_ff, jumlah_dmff, harga_dmff, img_dmff) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$kategori_ff, $jumlah_dmff, $harga_dmff, $target_file]);
    
                echo "<script>alert('Data berhasil disimpan!'); window.location.href = './input-game.php';</script>";
                exit; // Pastikan untuk keluar setelah redirect
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat upload gambar.'); window.location.href = './input-game.php';</script>";
                exit; // Pastikan untuk keluar setelah redirect
            }
        } else {
            echo "<script>alert('File bukan gambar.'); window.location.href = './input-game.php';</script>";
            exit; // Pastikan untuk keluar setelah redirect
        }
    }
} elseif (isset($_POST['submit_wdp'])) {
    // Similar processing for tb_wdp
    if (isset($_POST['submit_wdp'])) {
        $kategori_wdp = $_POST['kategori_wdp'];
        $jumlah_wdp = $_POST['jumlah_wdp'];
        $harga_wdp = $_POST['harga_wdp'];
        $img_wdp = $_FILES['img_wdp'];
    
        $target_directory = "kaivygame/assets/img/game/";
        $random_filename = uniqid() . "." . strtolower(pathinfo($img_wdp["name"], PATHINFO_EXTENSION));
        $target_file = $target_directory . $random_filename;
    
        $check = getimagesize($img_wdp["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($img_wdp["tmp_name"], $target_file)) {
                $sql = "INSERT INTO tb_wdp (kategori_wdp, jumlah_wdp, harga_wdp, img_wdp) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$kategori_wdp, $jumlah_wdp, $harga_wdp, $target_file]);
    
                echo "<script>alert('Data berhasil disimpan!'); window.location.href = './input-game.php';</script>";
                exit; // Pastikan untuk keluar setelah redirect
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat upload gambar.'); window.location.href = './input-game.php';</script>";
                exit; // Pastikan untuk keluar setelah redirect
            }
        } else {
            echo "<script>alert('File bukan gambar.'); window.location.href = './input-game.php';</script>";
            exit; // Pastikan untuk keluar setelah redirect
        }
}
}
// Rest of the processing and database code
?>