<?php include './koneksi/koneksi.php'; ?>
<?php include './koneksi/upload_detailorder.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="theme-color" content="#2d3238">
<meta name="title" content="Mobilegamestore - Suplier Games Murah Terpercaya">
<meta property="og:url" content="https://mobilegamestore.id/order/mobile-legends-montoon">
<meta property="og:title" content="Mobile Legends — Mobilegamestore">
<meta property="og:description" content="Top Up Diamond Mobile Legends Masukkan ID (SERVER)
                Pilih Nominal Diamond
                Pilih Metode Pembayaran
                Tulis nomor ">
<meta property="og:image" content="https://play-lh.googleusercontent.com/ha1vofCWS5lFhVe0gabwIetwjT4fUY5d6iDOP10KWRwnXci8lWI3ClxrqjoRuPZidg=s180-rw">
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="mobilegamestore.id">
<meta property="twitter:url" content="https://mobilegamestore.id/order/mobile-legends-montoon">
<meta name="twitter:title" content="Mobile Legends — Mobilegamestore">
<meta name="twitter:description" content="Top Up Diamond Mobile Legends Masukkan ID (SERVER)
                Pilih Nominal Diamond
                Pilih Metode Pembayaran
                Tulis n...">
<meta name="twitter:image" content="https://play-lh.googleusercontent.com/ha1vofCWS5lFhVe0gabwIetwjT4fUY5d6iDOP10KWRwnXci8lWI3ClxrqjoRuPZidg=s180-rw">
<meta name="description" content="Kaivystore.id adalah Platform webisite top up game termurah, tercepat, dan terpercaya di Indonesia. Proses cepat membuat Anda nyaman Top Up disini. Dengan Menyediakan berbagai macam pembayaran Transfer Bank, E-Wallet, Scan QR, Alfamart, &amp; Indomart dan pasti memudahkan anda untuk Top Up akun games kalian.">

<meta property="og:type" content="website">
<meta name="csrf-token" content="aeFEWaTq9uNjsBukoeQNS7YnYOn9FEhpByFoE8pW">
<link rel="icon" href="../assets/img/settings/1648277835logo&#32;final&#32;favoico-min.png@v=2">
<title>    Mobile Legends
 - Mobilegamestore</title>
<link rel="stylesheet" href="../assets/scss/app.css">
<link rel="stylesheet" href="../assets/css/app.css">
<link rel="stylesheet" href="../assets/scss/chatbox.css">
<link rel="stylesheet" href="../assets/admin/assets/plugins/bootstrap-select/bootstrap-select.min.css">
<script src="../assets/js/app.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
            #searchProds {
                width: 60px;
                transition: width .5s ease
            }

            #searchProds:focus {
                width: 240px
            }

        </style>
<script>
            $(document).ready(function() {

                $(".search_input").focusout(function() {
                    setTimeout(() => {
                        $(this).parent().dropdown("hide");
                    }, 300);
                    let $parent = $(this).parent(".mini").parent().parent().parent().parent();
                    setTimeout(() => {
                        $parent.find(".form-check").fadeIn(50);
                    }, 300);
                    $parent.parent().parent().find(".navbar-toggler").toggle("slide:left");
                });
                $(".search_input").focusin(function() {
                    let $parent = $(this).parent(".mini").parent().parent().parent().parent();
                    $parent.find(".form-check").fadeOut(50);
                    $parent.parent().parent().find(".navbar-toggler").toggle("slide:left");

                });
                $(".search_input").keyup(function(e) {
                    console.log(e.currentTarget)
                    if (e.keyCode == 13) {
                        $(this).parent().parent().submit();
                    }
                    var search = $(this).val();
                    $.ajax({
                        url: "https://mobilegamestore.id/api/search",
                        type: "POST",
                        data: {
                            q: search,
                            _token: "aeFEWaTq9uNjsBukoeQNS7YnYOn9FEhpByFoE8pW"
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                $(e.currentTarget).parent().dropdown("show");
                                console.log($(e.currentTarget).parent());
                                $(e.currentTarget).parent().siblings("#dropDownSearchResults").html(
                                    "")
                                let _results = [];
                                var sorted = {};
                                for (var i = 0, max = data.length; i < max; i++) {
                                    if (sorted[data[i].category] == undefined) {
                                        sorted[data[i].category] = [];
                                    }
                                    sorted[data[i].category].push(data[i]);
                                }
                                for (category in sorted) {
                                    _results.push(
                                        `<li><span class="dropdown-item-text"><b>${category.toUpperCase()}</b></span></li>`
                                    );
                                    sorted[category].forEach(element => {
                                        _results.push(`
                                            <li><a class="dropdown-item" href="https://mobilegamestore.id/order/:slug">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img src="https://mobilegamestore.id/order/${element.thumbnail}" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <b>${ element.name}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <small>${ element.subtitle }</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a></li>`
                                            .replace(':slug', element.slug))
                                    })
                                }

                                $(e.currentTarget).parent().siblings("#dropDownSearchResults")
                                    .append(_results
                                        .join(
                                            `<hr class="dropdown-divider">`));
                            } else {
                                $(e.currentTarget).parent().dropdown("hide");
                            }
                        }
                    });
                });
            })
        </script>
<style type="text/css">
    .ap-otp-input {
        border: 3px solid #ebebeb;
        border-radius: 18px;
        width: 35px;
        height: 53px;
        margin: 4px;
        text-align: center;
        font-size: 35px;
    }


    .ap-otp-input:focus {
        outline: none !important;
        border: 3px solid #1f6feb;
        transition: 0.12s ease-in;
    }
    .list-group-item {
        user-select: none;
    }
    .list-group-item:last-child {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .list-group input[type="radio"] {
        display: none;
    }
    .list-group1 input[type="radio"] {
        display: none;
    }
    .list-group input[type="radio"]+.list-group-item {
        text-align: center;
        cursor: pointer;
        background-color: #282c30;
        color: #dcddeb;
        border-color: transparent;
        border: 2px solid #282c30;
        font-size: 12px;
    }

    .nominal-price {
        font-size: 10px;
        text-align: left;
    }

    .name-prod {
        /* font-weight:600; */
        color: #ffffff;
        /* padding: 0%; */
        text-align: left;
    }

    .list-group input[type="radio"]+label>.row>.col>.row>.nominal-price {
        color: #dee2e6;
        /* font-style: bold; */
        font-family: 'bangjeff-comic';
        font-style: italic;
    }
    .list-group input[type="radio"]:checked+label>.row>.col>.row>.nominal-price {
        color: #FF4500;
        font-family: 'bangjeff-comic';
        /* font-style: bold; */
        font-style: italic;
    }

    .list-group input[type="radio"]+.list-group-item:before {
        /* content: "\2713"; */
        color: transparent;
        font-weight: bold;
        /* margin-right: 1em; */

    }

    .list-group input[type="radio"]+.list-group-item:hover {
        cursor: pointer;
        background-color: #adadad43;
        color: #ffffff;
        border-color: #adadad43;

        font-size: 12px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .list-group input[type="radio"]:checked+.list-group-item:before {
        color: inherit;
    }
    .list-group input[type="radio"]:checked+.list-group-item:after {
        position: absolute;
        top: 0;
        right: 0;
        width: 28px;
        height: 26px;
        content: "";
        background: url(../assets/img/verified-red.png) top/cover;
        text-align: center;
    }
    .list-group input[type="radio"]:checked+.list-group-item {
        color: #ef222243;
        font-size: 12px;
        border: 2px solid #c9c9c993;
        box-shadow: 0 0 2.22222vw #ababab, inset 0 2.40741vw 8.05556vw #adadad43, inset 0 -8.24074vw 11.48148vw #adadad43;
        overflow: hidden;
    }
    .list-group1 input[type="radio"]:checked+.list-group-item:before {
        color: inherit;
    }
    .list-group1 input[type="radio"]:checked+.list-group-item {
        background-color: #ffffff;
        color: #fe6c17;
        font-size: 12px;
        display: block;
        -webkit-filter: grayscale(0%);
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%);
    }
    .list-group1 input[type="radio"]+.list-group-item {
        text-align: center;
        cursor: pointer;
        /* background-color: #e8e8e8;
        color: #fe6c17; */
        border-color: transparent;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.2), 0 5px 10px 0 rgba(0,0,0,0.19);
        font-size: 12px;
        border-radius: 3px;
        background: rgb(208, 208, 208);
        -webkit-filter: grayscale(100%);
        /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
    }
    .list-group1 input[type="radio"]+.list-group-item:hover {
        cursor: pointer;
        background-color: #ffffff;
        color: #fe6c17;
        border-color: #ffffff;
        box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2), 0 6px 12px 0 rgba(0,0,0,0.19);
        font-size: 12px;
        border-radius: 3px;
    }
    .list-group1 input[type="radio"]:checked+.list-group-item:before {
        color: inherit;
    }

        /* .list-group input[type="radio"]+.list-group-item:hover {
            cursor: pointer;
            background-color: rgba(255, 255, 230, 0.5);
            color: rgb(102, 102, 102);
            border-color: #f20305;

            font-size: 12px;
            border-radius: 3px;
        }
        .list-group input[type="radio"]:checked+.list-group-item {
            background-color: #f20305;
            color: #FFF;
            font-size: 12px;
        } */

    </style>
</head>
<style>
    #searchProds {
        width: 60px;
        transition: width .5s ease
    }

    #searchProds:focus {
        width: 240px
    }

    .wave {
        min-height: 100%;
        background-attachment: scroll;
        background-image: url("../assets/img/wave.svg");
        background-repeat: no-repeat;
        background-position: bottom left, bottom right;
    }

    .wave2 {
        min-height: 100%;
        background-attachment: fixed;
        background-image: url("../assets/img/wave2.svg");
        background-repeat: no-repeat;
        background-position: top left, top right;
    }

    .fab-container {
        position: fixed;
        bottom: 70px;
        right: 10px;
        z-index: 999;
        cursor: pointer;
    }

    .fab-icon-holder {
        width: 45px;
        height: 45px;
        bottom: 140px;
        left: 10px;
        color: #FFF;
        background: #5865f2;
        border-radius: 10px;
        text-align: center;
        font-size: 30px;
        z-index: 99999;
    }

    .fab-icon-holder:hover {
        opacity: 0.8;
    }

    .fab-icon-holder i {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        font-size: 25px;
        color: #ffffff;
    }

    .fab-options {
        list-style-type: none;
        margin: 0;
        position: absolute;
        bottom: 48px;
        left: -37px;
        opacity: 0;
        transition: all 0.3s ease;
        transform: scale(0);
        transform-origin: 85% bottom;
    }

    .fab:hover+.fab-options,
    .fab-options:hover {
        opacity: 1;
        transform: scale(1);
    }

    .fab-options li {
        display: flex;
        justify-content: flex-start;
        padding: 5px;
    }

    .fab-label {
        padding: 2px 5px;
        align-self: center;
        user-select: none;
        white-space: nowrap;
        border-radius: 3px;
        font-size: 16px;
        background: #666666;
        color: #ffffff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        margin-left: 10px;
    }

    .act-btn {
        display: block;
        position: fixed;
        width: 45px;
        height: 45px;
        bottom: 140px;
        left: 10px;
        color: #FFF;
        background: #5c8a8a;
        border-radius: 10px;
        text-align: center;
        font-size: 30px;
        z-index: 99999;
    }

    .act-btn:hover {
        background: #212529;
    }

    .act-btn-top {
        display: none;
        position: fixed;
        width: 45px;
        height: 45px;
        bottom: 140px;
        left: 10px;
        color: #FFF;
        background: #5c8a8a;
        border-radius: 10px;
        text-align: center;
        font-size: 30px;
        z-index: 99999;
    }

    .act-btn-top:hover {
        background: #212529;
    }

    .rounded-img-buy {
        border-radius: 0.5rem !important;
    }

    .size-img-buy {
        width: 80%;
    }

    .size-img-buy-v {
        width: 100px;
        height: auto;
    }

    .btn-topup {
        color: #ffffff !important;
        background-color: #e10603 !important;
        width: 90%;
        max-width: 130px;
    }
    .text-yellow {
        color: #e10603 !important;
    }
    .btn-primary {
        color: #ffffff !important;
        background-color: #e10603 !important;
        border-color: #f11b19;
    }

    .strip-primary {
        background-color: #e10603 !important;
    }

    .btn-primary:hover {
        color: #ffffff !important;
        background-color: #e10603 !important;
        border-color: #f11b19;
        box-shadow: 2px 2px #f11b19;

    }

    .btn-topup:hover {
        color: #ffffff !important;
        background-color: #e10603 !important;
        border-color: #f11b19;
        box-shadow: 2px 2px #f11b19;
        width: 90%;
    }

</style>
<body style="background-color: #2d3238" class="d-flex flex-column min-vh-100  text-white">

<?php include './header.php'; ?>

<div class="wrapper pt-4">
<br>
<div class="container">

<div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="petunjukModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header bg-dark">
<h5 class="modal-title text-white" id="petunjukModalLabel">Petunjuk</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body bg-dark">
<img src="../assets/img/1648171115intruksi.jpg" alt="Petunjuk Mobile Legends" class="img-fluid">
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mt-2 mb-2">
<div class="row">
<div class="col-12">
<div class="card bg-dark shadow">
<div class="card-body">
<?php

// Mendapatkan ID game dari URL
$id_listgame = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data game berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM tb_listgame WHERE id_listgame = :id");
$stmt->execute([':id' => $id_listgame]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

if ($game) {
    // Tampilkan detail game
    echo '<img src="/kaivygame/assets/img/game/' . htmlspecialchars($game['img_game']) . '" alt="' . htmlspecialchars($game['game_name']) . '" class="shadow rounded bg-dark mx-auto mb-2 d-lg-block d-none " width="150">';
    echo '<div class="row">';
    echo '<div class="col">';
    echo '<h3>' . htmlspecialchars($game['game_name']) . '</h3>';
    echo '<div class="strip-primary"></div><br>';
    echo '<span class="text-muted mt-3 mb-3">' . htmlspecialchars($game['publisher_name']) . '</span>';
    echo '<img src="/kaivygame/assets/img/game/' . htmlspecialchars($game['img_game']) . '" alt="' . htmlspecialchars($game['game_name']) . '" class="shadow rounded bg-dark float-start mt-2 me-2 mb-0 d-lg-none d-block" width="45">';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>Game tidak ditemukan.</p>';
}
?>

<p>Top Up Diamond Mobile Legends <ol><li>Masukkan <b>ID (SERVER)
</b></li><li>Pilih <b>Nominal </b>Diamond
</li><li>Pilih <b>Metode Pembayaran</b>
</li><li>Tulis <b>nomor WhatsApp</b> yg benar!
</li><li>Klik <b>Beli </b>&amp; lakukan Pembayaran
</li><li><b>Tunggu 1 Menit</b> diamond masuk otomatis ke akun Anda.</li></ol><p style="text-align: center; "><font size="3" color="#ff9c00"><b>Top Up Buka 24 Jam</b></font></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p></p>
</div>
</div>
</div>
</div>
</div>
<?php
// Ambil id_listgame dari parameter URL
$id_listgame = isset($_GET['id']) ? $_GET['id'] : null;

// Query SQL untuk mengambil detail game berdasarkan id_listgame
$stmt = $pdo->prepare("SELECT * FROM tb_listgame WHERE id_listgame = ?");
$stmt->execute([$id_listgame]);

// Periksa apakah query berhasil dieksekusi dan apakah ada hasil yang ditemukan
if ($stmt && $stmt->rowCount() > 0) {
    // Ambil hasil query
    $game_details = $stmt->fetch(PDO::FETCH_ASSOC);

    // Tentukan nama game
    $game_name = $game_details['game_name'];

    // Tampilkan formulir sesuai dengan nama game
    ?>
    <!-- Form input detail game -->
    <div class="col-lg-8 mt-2 mb-2">
        <div class="wrapper pt-4">
            <br>
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card bg-dark shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title text-center">Input Diamond <?php echo $game_name; ?></h3>
                            </div>
                            <div class="card-body">
                            <form action="upload_dmlbb.php" enctype="multipart/form-data" method="post">
                                <?php if ($game_name == 'Mobile Legends'): ?>
                                    <!-- Form untuk game Mobile Legends -->
                                    <!-- Isi formulir sesuai dengan input untuk Mobile Legends -->
                                    <!--  -->
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input required type="text" name="kategori_ml" id="kategori_ml" class="form-control" placeholder="Masukkan Kategori! (Cth: ML A)" aria-label="kategori_ml" aria-describedby="kategori_ml" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="jumlah_dmlbb" id="jumlah_dmlbb" class="form-control" placeholder="Masukkan Jumlah! (Cth:3 (3+0))" aria-label="jumlah_dmlbb" aria-describedby="jumlah_dmlbb" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="harga_dmlbb" id="harga_dmlbb" class="form-control" placeholder="Masukkan Harga!" aria-label="harga_dmlbb" aria-describedby="harga_dmlbb" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                        <input class="form-control" placeholder="Uploads Image" type="file" name="img_dmlbb" id="img_dmlbb" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="text-end">
                                        <button class="btn btn-primary" type="submit" name="submit_dmlbb">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Submit
                                        </button>
                                        </div>
                                    </div>
                                    <!-- Isi formulir sesuai dengan input untuk Mobile Legends -->
                                <?php elseif ($game_name == 'FreeFire'): ?>
                                    <!-- Form untuk game Free Fire -->
                                    <!-- Isi formulir sesuai dengan input untuk Free Fire -->
                                    <!-- contoh -->
                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="kategori_ff" id="kategori_ff" class="form-control" placeholder="Masukkan Kategori! (Cth: FF A)" aria-label="kategori_ff" aria-describedby="kategori_dmff" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="jumlah_dmff" id="jumlah_dmff" class="form-control" placeholder="Masukkan Jumlah! (Cth:3 (3+0)" aria-label="jumlah_dmff" aria-describedby="jumlah_dmff" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="harga_dmff" id="harga_dmff" class="form-control" placeholder="Masukkan Harga!" aria-label="harga_dmff" aria-describedby="harga_dmff" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                        <input class="form-control" placeholder="Uploads Image" type="file" name="img_dmff" id="img_dmff" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="text-end">
                                        <button class="btn btn-primary" type="submit" name="submit_dmff">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Submit
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                               
                                    <!-- Isi formulir sesuai dengan input untuk Free Fire -->
                                    <?php elseif ($game_name == 'Weekly Diamond Pass'): ?>
                                    <!-- Form untuk game Free Fire -->
                                    <!-- Isi formulir sesuai dengan input untuk Free Fire -->
                                    <!-- contoh -->
                                    <div class="mb-2">

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="jumlah_wdp" id="jumlah_wdp" class="form-control" placeholder="Masukkan Jumlah! (Cth:3 (3+0)" aria-label="jumlah_wdp" aria-describedby="jumlah_wdp" autocomplete="owdp">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                        <input required type="text" name="harga_wdp" id="harga_wdp" class="form-control" placeholder="Masukkan Harga!" aria-label="harga_wdp" aria-describedby="harga_wdp" autocomplete="owdp">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                        <input class="form-control" placeholder="Uploads Image" type="file" name="img_wdp" id="img_wdp" required>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="text-end">
                                        <button class="btn btn-primary" type="submit" name="submit_wdp">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Submit
                                        </button>
                                        </div>
                                    </div>
                                    <!-- Isi formulir sesuai dengan input untuk Free Fire -->
                                <?php endif; ?>

                                <!-- Tambahkan input lain sesuai kebutuhan untuk setiap game -->
                            </form>             
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "Detail game tidak ditemukan.";
}
?>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // This code will run after the document is fully loaded

    // Add an event listener to the form submissions
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            let form = this.closest('form');

            let formData = new FormData(form);
            // Append the specific submit action to the FormData object
            formData.append(this.name, "");

            // Perform the AJAX request
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./koneksi/upload_detailorder.php", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Notify the user of a successful upload
                    alert("Data berhasil di input!");
                } else {
                    // Handle error
                    alert("Terjadi kesalahan, silakan coba lagi.");
                }
            };
            xhr.send(formData);
        });
    });
});
</script>  
</div>
</div>
</div>

 <!--Footer-->
 <?php include './footer.php';?>

<!--End Footer-->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

<!-- Your body content goes here -->

    <script src="../assets/admin/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../assets/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="../assets/js/switch.js"></script>
    <script src="../assets/js/promoBox.js"></script>

    <div class="fab-container">
        <div class="fab fab-icon-holder" style="background-color:#FFF; padding:5px">
            <img src="../assets/img/logos/callcenter.png" class="img-fluid" alt="">
        </div>
        <ul class="fab-options">
            <li>
                <a href="https://www.instagram.com/mobilegamestores.id/" class="text-decoration-none" target="_blank">
                    <div class="fab-icon-holder" style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
                        <i class="fab fa-instagram"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://api.whatsapp.com/send?phone=6282122781575" class="text-decoration-none" target="_blank">
                    <div class="fab-icon-holder" style="background-color: #25D366;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.tiktok.com/@mobilegamestore.id" class="text-decoration-none" target="_blank">
                    <div class="fab-icon-holder" style="background-color: #5865F2;">
                        <i class="fab fa-tiktok"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/mobilegamestore.idd" class="text-decoration-none" target="_blank">
                    <div class="fab-icon-holder" style="background-color: #3b5998;">
                        <i class="fab fa-facebook"></i>
                    </div>
                </a>
            </li>
        </ul>
        <a href="input-detail.php#" class="act-btn-top text-decoration-none" onclick="toTop()" style="display: none; background-color: #bd4cae; bottom: 19px;">
            <i class="fas fa-angle-up mt-2"></i>
        </a>
    </div>

    <script src="https://cdn.socket.io/4.1.2/socket.io.min.js" integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg" crossorigin="anonymous"></script>
    </body>
    <script>
        mybutton = document.querySelector(".act-btn-top");
        window.onscroll = function() {
            scrollFunc()
        };

        function scrollFunc() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function toTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</html>
