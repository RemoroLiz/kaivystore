<?php include './koneksi/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="theme-color" content="#2d3238" />
<meta name="title" content="Kaivystore - Top Up Games Murah Terpercaya" />
<meta name="description" content="Kaivystore.id adalah Platform webisite top up game termurah, tercepat, dan terpercaya di Indonesia. Proses cepat membuat Anda nyaman Top Up disini. Dengan Menyediakan berbagai macam pembayaran Transfer Bank, E-Wallet, Scan QR, Alfamart, & Indomart dan pasti memudahkan anda untuk Top Up akun games kalian." />
<meta property="og:type" content="website" />
<meta name="csrf-token" content="aeFEWaTq9uNjsBukoeQNS7YnYOn9FEhpByFoE8pW" />
<link rel="icon" href="../assets/img/settings/kaivylogo.png" />
<title>KaivyStore - TopUp Games Murah Terpercaya</title>
<link rel="stylesheet" href="../assets/scss/app.css" />
<link rel="stylesheet" href="../assets/css/app.css" />
<link rel="stylesheet" href="../assets/scss/chatbox.css" />
<link rel="stylesheet" href="../assets/admin/assets/plugins/bootstrap-select/bootstrap-select.min.css" />
<script src="../assets/js/app.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <style>
      #searchProds {
        width: 60px;
        transition: width 0.5s ease;
      }

      #searchProds:focus {
        width: 240px;
      }
  </style>
</head>

  <style>
    #searchProds {
      width: 60px;
      transition: width 0.5s ease;
    }

    #searchProds:focus {
      width: 240px;
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
      color: #fff;
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

    .fab:hover + .fab-options,
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
      color: #fff;
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
      color: #fff;
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
  
  <body
    style="background-color: #2d3238"
    class="d-flex flex-column min-vh-100 text-white"
  >

  <?php include './header.php';?>

    <div class="wrapper pt-4">
    <br />
    <div class="row d-lg-none d-inline-block m-0 w-100">
        <div class="mt-4 d-lg-none d-block dropdown">
            <form action="https://mobilegamestore.id/search" method="get">
                <div class="input-group me-3 search-bar mini" aria-haspopup="true" id="dropsearchdown">
                    <input type="text" name="q" placeholder="Search products..." id="searchProds" class="form-control search_input" autocomplete="off" />
                    <button type="submit" class="btn btn-primary" id="btnSearchProds">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <ul class="dropdown-menu dropdown-menu-dark position-absolute shadow navbar-nav-scroll" aria-labelledby="dropsearchdown" id="dropDownSearchResults"></ul>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row d-none d-lg-block">
            <div class="col-lg-9 mx-auto">
                <div class="nav-item mt-4 col-lg-4 dropdown d-lg-inline-block mx-auto justify-content-center">
                    <li class="nav-item pe-md-2 dropdown d-lg-inline-block">
                        <form action=" " method="get">
                            <div class="input-group me-3 search-bar" aria-haspopup="true" id="dropsearchdown">
                                <input style="width: 200px" type="text" name="q" placeholder="Cari Game anda disini" id="searchProds" class="form-control search_input" autocomplete="off" />
                                <button type="submit" class="btn btn-primary" id="btnSearchProds">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark position-absolute shadow navbar-nav-scroll" aria-labelledby="dropsearchdown" id="dropDownSearchResults"></ul>
                        </form>
                    </li>
                </div>
            </div>
        </div>

        <!--End Of Search-->

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row mb-4">
                    <div class="col-lg-9 mx-auto mt-4">
                        <h5>
                            List Game
                            <div class="strip-primary mt-2"></div>
                        </h5>
                    </div>
                    <div class="col-lg-9 mx-auto mt-5">
                        <div class="row row-cols-3 row-cols-md-6 g-2 justify-content-center">
                            <?php
                                // Query SQL untuk mengambil data dari tb_listgame, diurutkan berdasarkan id_listgame secara ascending
                                $stmt = $pdo->query("SELECT * FROM tb_listgame ORDER BY id_listgame ASC");
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Menampilkan data dalam format HTML
                                foreach ($rows as $row) {
                                    // Ubah nama game menjadi format URL friendly
                                    $game_name_url = strtolower(str_replace(' ', '-', $row['game_name']));

                                    echo '<div class="col mt-5 mb-5">';
                                    echo '<div class="card bg-dark shadow h-100 rounded" style="max-width: 100%; cursor: pointer" onclick="window.location=\'detail-' . $game_name_url . '.php\'">';
                                    echo '<img src="/kaivygame/assets/img/game/' . $row['img_game'] . '" class="card-img-top rounded-img-buy size-img-buy position-absolute top-4 start-50 translate-middle" alt="Game Image"/>';
                                    echo '<div class="card-body text-center mt-5 mb-0">';
                                    echo '<small class="text-sm">' . $row['game_name'] . '</small><br />';
                                    echo '<small class="text-sm text-muted">' . $row['publisher_name'] . '</small>';
                                    echo '</div>';
                                    echo '<div class="col justify-content-center my-auto">';
                                    echo '<a href="detail-game.php?id=' . $row['id_listgame'] . '" class="btn btn-topup float-end rounded-pill m-2 btn-sm">Input Detail</a>';
                                    echo '<a href="input-detail.php?id=' . $row['id_listgame'] . '" class="btn btn-topup float-end rounded-pill m-2 btn-sm">Input Detail</a>';
                                    echo '<a href="update-detail.php?id=' . $row['id_listgame'] . '" class="btn btn-topup float-end rounded-pill m-2 btn-sm">Update Detail</a>';
                                    echo '<a href="delete-detail.php?id=' . $row['id_listgame'] . '" class="btn btn-topup float-end rounded-pill m-2 btn-sm">Delete Detail</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--Footer-->
    <?php include './footer.php';?>

    <!--End Footer-->

    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
    </script>

    <!-- Script bootstrap-->
    <script src="assets/admin/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="assets/js/switch.js"></script>
    <script src="assets/js/promoBox.js"></script>
    <!-- Script bootstrap-->

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

    <!-- Script cdn-->
    <script
      src="https://cdn.socket.io/4.1.2/socket.io.min.js"
      integrity="sha384-toS6mmwu70G0fw54EGlWWeA4z3dyJ+dlXBtSURSKN4vyRFOcxd3Bzjj/AoOwY+Rg"
      crossorigin="anonymous"
    ></script>
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
