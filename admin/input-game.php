
<?php include './koneksi/koneksi.php'; ?>
<?php include './koneksi/upload.php'; ?>
<?php include './koneksi/check_game.php'; ?>
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
<meta name="description" content="Mobilegamestore.id adalah Platform webisite top up game termurah, tercepat, dan terpercaya di Indonesia. Proses cepat membuat Anda nyaman Top Up disini. Dengan Menyediakan berbagai macam pembayaran Transfer Bank, E-Wallet, Scan QR, Alfamart, &amp; Indomart dan pasti memudahkan anda untuk Top Up akun games kalian.">

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
<?php include './header.php';?>
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
                        <div class="row">
                            <div class="col">
                                <h3>Input Data Game</h3>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="card flex-row flex-wrap bg-dark">
                                            <div class="card-body">
                                                <p> 1. Input Yang BENAR Ya!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mt-2 mb-2">
        <div class="wrapper pt-4">
            <br>
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card bg-dark shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title text-center">Input Games</h3>
                            </div>
                            <!-- Mulai tag <form> di sini -->
                            <form id="gameForm" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                            <input required type="text" name="game_name" id="game_name" class="form-control" placeholder="Masukkan Nama Game" aria-label="Name" aria-describedby="game_name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                            <input required type="text" class="form-control" placeholder="Publisher" aria-label="publisher_name" aria-describedby="publisher_name" id="publisher_name" name="publisher_name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user-circle"></i></span>
                                            <input class="form-control" placeholder="Uploads Image" type="file" name="img_game" id="img_game" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <!-- Perubahan type button menjadi type submit dan penghapusan atribut onclick -->
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-sign-in-alt"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Akhir tag <form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk membatasi input hanya pada huruf dan angka
    function allowOnlyLettersAndNumbers(event) {
      var keyCode = event.keyCode || event.which;
      var key = String.fromCharCode(keyCode);
      var regex = /^[a-zA-Z0-9\s]+$/;
      if (!regex.test(key)) {
        event.preventDefault();
        return false;
      }
    }

    // Mendapatkan elemen input nama game
    var gameNameInput = document.getElementById('game_name');
    // Menambahkan event listener untuk membatasi input
    gameNameInput.addEventListener('keypress', allowOnlyLettersAndNumbers);

    // Mendapatkan elemen input nama publisher
    var publisherNameInput = document.getElementById('publisher_name');
    // Menambahkan event listener untuk membatasi input
    publisherNameInput.addEventListener('keypress', allowOnlyLettersAndNumbers);
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('gameForm').addEventListener('submit', function(event) {
      // Validasi nama game
      var gameName = document.getElementById('game_name').value;
      if (!/^[a-zA-Z0-9\s]+$/.test(gameName)) {
        alert('Nama game hanya boleh mengandung huruf dan angka.');
        event.preventDefault();
        return;
      }

      // Validasi nama publisher
      var publisherName = document.getElementById('publisher_name').value;
      if (!/^[a-zA-Z0-9\s]+$/.test(publisherName)) {
        alert('Nama publisher hanya boleh mengandung huruf dan angka.');
        event.preventDefault();
        return;
      }

      // Validasi gambar
      var imgGame = document.getElementById('img_game').value;
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
      if (!allowedExtensions.exec(imgGame)) {
        alert('Hanya file gambar yang diizinkan (format JPG, JPEG, PNG, GIF).');
        event.preventDefault();
        return;
      }
    });
  });
</script>

<!-- AJAX -->
<script>
  // file: check_game.js
  $(document).ready(function() {
    $("#game_name").on('blur', function() {
      var gameName = $(this).val();
      if (gameName !== '') {
        $.ajax({
          url: 'check_game_name.php',
          type: 'post',
          data: {
            game_name: gameName
          },
          success: function(response) {
            if (response === 'exists') {
              alert('Nama game sudah tersedia');
              // Opsi lain, Anda bisa menggunakan library seperti SweetAlert untuk UI yang lebih baik
            }
          }
        });
      }
    });
  });
</script>

<?php include './footer.php' ?>

<script src="../assets/admin/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="../assets/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../assets/js/switch.js"></script>
<script src="../assets/js/promoBox.js"></script>
<script src="https://cdn.socket.io/4.1.2/socket.io.min.js" integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg" crossorigin="anonymous"></script>


 <!-- Contact-->
    <div class="fab-container">
      <div
        class="fab fab-icon-holder"
        style="background-color: #fff; padding: 5px"
      >
        <img src="../assets/img/logos/callcenter.png" class="img-fluid" alt="" />
      </div>
      <ul class="fab-options">
        <li>
          <a
            href="https://www.instagram.com/kaivystoree.id/"
            class="text-decoration-none"
            target="_blank"
          >
            <div
              class="fab-icon-holder"
              style="
                background: radial-gradient(
                    circle farthest-corner at 35% 90%,
                    #fec564,
                    transparent 50%
                  ),
                  radial-gradient(
                    circle farthest-corner at 0 140%,
                    #fec564,
                    transparent 50%
                  ),
                  radial-gradient(
                    ellipse farthest-corner at 0 -25%,
                    #5258cf,
                    transparent 50%
                  ),
                  radial-gradient(
                    ellipse farthest-corner at 20% -50%,
                    #5258cf,
                    transparent 50%
                  ),
                  radial-gradient(
                    ellipse farthest-corner at 100% 0,
                    #893dc2,
                    transparent 50%
                  ),
                  radial-gradient(
                    ellipse farthest-corner at 60% -20%,
                    #893dc2,
                    transparent 50%
                  ),
                  radial-gradient(
                    ellipse farthest-corner at 100% 100%,
                    #d9317a,
                    transparent
                  ),
                  linear-gradient(
                    #6559ca,
                    #bc318f 30%,
                    #e33f5f 50%,
                    #f77638 70%,
                    #fec66d 100%
                  );
              "
            >
              <i class="fab fa-instagram"></i>
            </div>
          </a>
        </li>
        <li>
          <a
            href="https://api.whatsapp.com/send?phone=6285156321023"
            class="text-decoration-none"
            target="_blank"
          >
            <div class="fab-icon-holder" style="background-color: #25d366">
              <i class="fab fa-whatsapp"></i>
            </div>
          </a>
        </li>
      </ul>
      <a
        href="index.php#"
        class="act-btn-top text-decoration-none"
        onclick="toTop()"
        style="display: none; background-color: #bd4cae; bottom: 19px"
      >
        <i class="fas fa-angle-up mt-2"></i>
      </a>
    </div>
    <!-- Contact -->
<div class="fab-container">
  <div class="fab fab-icon-holder" style="background-color: #fff; padding: 5px">
    <img src="../assets/img/logos/callcenter.png" class="img-fluid" alt="" />
  </div>
  <ul class="fab-options">
    <li>
      <a href="https://www.instagram.com/kaivystoree.id/" class="text-decoration-none" target="_blank">
        <div class="fab-icon-holder" style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
          <i class="fab fa-instagram"></i>
        </div>
      </a>
    </li>
    <li>
      <a href="https://api.whatsapp.com/send?phone=6285156321023" class="text-decoration-none" target="_blank">
        <div class="fab-icon-holder" style="background-color: #25d366">
          <i class="fab fa-whatsapp"></i>
        </div>
      </a>
    </li>
  </ul>
  <a href="index.php#" class="act-btn-top text-decoration-none" onclick="toTop()" style="display: none; background-color: #bd4cae; bottom: 19px">
    <i class="fas fa-angle-up mt-2"></i>
  </a>
</div>

<!-- Script cdn -->
<script src="https://cdn.socket.io/4.1.2/socket.io.min.js" integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg" crossorigin="anonymous"></script>

</body>
<!-- Function scrolltop-->
<script>
    mybutton = document.querySelector(".act-btn-top");
    window.onscroll = function () {
      scrollFunc();
    };

    function scrollFunc() {
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
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
