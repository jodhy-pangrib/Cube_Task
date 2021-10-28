<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        nav{
            background-color: #03045E;
        }
        nav form button{
          background-color: rgba(0, 0, 0, 0.5);
        }
        footer{
            background-color: #03045E;
        }
        footer .btn,  footer .copyright{
            background-color: rgba(0, 0, 0, 0.2);
        }
    </style>
    <title>Harga Paket</title>
  </head>
  <body>
  <nav class="navbar fixed-top navbar-dark navbar-expand-md justify-content-md-center justify-content-start">
      <div class="container-fluid">
        <img src="../logo.png" alt="" width="30" height="30"/>
        <a class="navbar-brand">CubeTask</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; padding-right: 3.5rem;">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentangKami.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Harga Paket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pemesanan.php">Pemesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kontak.php">Kontak</a>
            </li>
          </ul>
          <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap"></ul>
            <?php
              session_start();
              if(!isset($_SESSION['isLogin'])) {
                echo ' 
                <div class="d-flex">
                    <a class="text-light" style="text-decoration: none" href="login.php">
                      <button type="button" class="btn btn-outline-primary" style="color: #f0f0f0;">LOGIN</button>
                    </a>
                </div>';
              } else {
                echo ' 
                <div class="d-flex">
                  <a class="text-light" style="text-decoration: none" href="profil.php">
                    <i class="fa fa-user-circle fa-2x pe-3 ps-4" aria-hidden="true" style="color: white;"></i>
                  </a>
                </div>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container v-100 d-flex justify-content-center" style="margin-top: 80px">
      <div class="card shadow" style="width: 18rem; float: left; margin-top: 20px">
        <div class="card-header" style="text-align: center; background-color: #ffb3c1; color: white">
          <b>Paket Santuy</b>
          <br>
          <b>Rp. 100.000</b>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Pengerjaan 2 Minggu</li>
          <li class="list-group-item">Hasil Tugas Berupa .doc dan .pdf</li>
          <li class="list-group-item">Jumlah halaman 1-10 Lembar</li>
          <li class="list-group-item d-flex justify-content-center">
            <a class="btn btn-outline-success btn-sm" href="pemesanan.php" style="margin-top: 10px; margin-bottom: 10px">Pesan Sekarang</a>
          </li>
        </ul>
      </div>

      <div class="card shadow" style="width: 18rem; float: left">
        <div class="card-header" style="text-align: center; background-color: #fe5e54; color: white">
          <b>Paket Normal</b>
          <br>
          <b>Rp. 200.000</b>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Pengerjaan 4-7 Hari</li>
          <li class="list-group-item">Hasil Tugas Berupa .doc dan .pdf</li>
          <li class="list-group-item">Jumlah halaman 1-20 Lembar</li>
          <li class="list-group-item d-flex justify-content-center">
            <a class="btn btn-outline-success btn-sm" href="pemesanan.php" style="margin-top: 10px; margin-bottom: 10px">Pesan Sekarang</a>
          </li>
        </ul>
      </div>

      <div class="card shadow" style="width: 18rem; float: left; margin-top: 20px">
        <div class="card-header" style="text-align: center; background-color: #00c9b8; color: white">
          <b>Paket Buruan Kuy</b>
          <br>
          <b>Rp. 300.000</b>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Pengerjaan 1-3 Hari</li>
          <li class="list-group-item">Hasil Tugas Berupa .doc dan .pdf</li>
          <li class="list-group-item">Jumlah halaman 1-25 Lembar</li>
          <li class="list-group-item d-flex justify-content-center">
            <a class="btn btn-outline-success btn-sm" href="pemesanan.php" style="margin-top: 10px; margin-bottom: 10px">Pesan Sekarang</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- footer website -->
    <footer class="text-center text-lg-start" style="position: absolute; bottom: 0; width: 100%">
      <div class="container d-flex justify-content-center py-3 pe-4">
        <a href="https://facebook.com" target=”_blank”>
          <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="border: none;" >
            <ion-icon name="logo-facebook" style="color: white;"></ion-icon>
          </button>
        </a>
        <a href="https://youtube.com" target=”_blank”>
          <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="border: none;">
            <ion-icon name="logo-youtube" style="color: white;"></ion-icon>
          </button>
        </a>
        <a href="https://instagram.com" target="_blank">
          <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="border: none;">
            <ion-icon name="logo-instagram" style="color: white;" ></ion-icon>
          </button>
        </a>
        <a href="https://twitter.com" target="_blank">
          <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="border: none;">
            <ion-icon name="logo-twitter" style="color: white;"></ion-icon>
          </button>
        </a>
      </div>
  
        <!-- Copyright -->
        <div class="text-center text-white pt-3 pb-3 ps-3 copyright" style="padding-right: 1.75rem;">
          © 2021 Copyright: All Rights Reserved
        </div>
    </footer>
      <!-- Copyright -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>