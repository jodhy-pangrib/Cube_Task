<?php
    session_start();
    if (!$_SESSION['isLogin']) {
        header("location: login.php");
        exit;
    }else {
      if($_SESSION['user']!="admin") {
        header("location: ../index.php");
        exit;
      } else {
        include('../db.php');
      }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <title>List Pesanan</title>
    <style>
        .side-bar {
            width: 300px;
            background-color: #03045E;
            min-height: 100vh;
        }

        a {
            font-size: 13px;
            text-decoration: none;
            color: white;
        }

        .menu i {
            padding-left: 20px;
        }

        .menu .content-menu {
            padding: 9px 7px;
        }

        .isActive {
            background-color: #071853 !important;
            border-right: 8px solid #010E2F;
        }

        i {
            color: white;
        }
    </style>
</head>

<body>
    <aside>
        <div class="d-flex">
            <div class="side-bar">
                <h4 class="text-light text-center pt-3">ADMIN</h4>
                <hr>
                <div class="menu">
                    <div class="content-menu ">
                        <i class="fa fa-list"></i>
                        <a href="./admin.php" style="font-weight:600">List Pesanan</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-plus-square"></i>
                        <a href="./addPesanan.php" style="font-weight:600">Add Pesanan</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-sign-out"></i>
                        <a href="../process/logoutProcess.php" style="font-weight:600">Logout</a>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <h4>Data User</h4>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Jenis Paket</th>
                            <th scope="col">Harga Paket</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM pemesanan") or die(mysqli_error($con));
                        
                        if (mysqli_num_rows($query) == 0) {
                            echo '<tr> <td colspan="6" style="text-align: center;"> Tidak ada data </td> </tr>';
                        } else {
                            $no = 1;
                            while($data = mysqli_fetch_assoc($query)){
                            echo'
                                <tr>
                                    <th class="text-center" scope="row">'.$no.'</th>
                                    <td>'.$data['nama'].'</td>
                                    <td>'.$data['email'].'</td>
                                    <td>'.$data['noHp'].'</td>
                                    <td>'.$data['jenisPaket'].'</td>
                                    <td>'.$data['hargaPaket'].'</td>
                                    <td class="text-center">
                                    <a href="edit.php?id='.$data['id'].'">
                                        <i style="color: green;" class="fa fa-edit"></i>
                                    </a>
                                    <a href="../process/deleteProcess.php?id='.$data['id'].'"
                                        onClick="return confirm ( \'Yakin?\')">
                                        <i style="color: red" class="fa fa-trash"></i>
                                    </a>
                                    </td>
                                </tr>';
                            $no++;
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>