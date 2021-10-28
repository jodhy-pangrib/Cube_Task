<?php
    session_start();
    if (!$_SESSION['isLogin']) {
        header("location: ../page/login.php");
        exit;
    }else {
      if($_SESSION['user']!="admin") {
        header("location: ../index.php");
        exit;
      } else {
        include('../db.php');
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
            
        $query = mysqli_query($con, "SELECT * FROM pemesanan WHERE id = '$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($query);
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
    <title>Edit Pesanan</title>
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
                <h4>EDIT PESANAN</h4>
                <hr>
                <form action="<?php echo '../process/editProcess.php?id='.$data['id'].'' ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama" id="nama" required value="<?php echo $data['nama'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" >Email</label>
                    <input type="email" class="form-control" name="email" id="email" required value="<?php echo $data['email'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="noHp" class="form-label" >No. HP</label>
                    <input type="tel" class="form-control" name="noHp" id="noHp" pattern="[0]{1}[8]{1}[0-9].{7,9}" required value="<?php echo $data['noHp'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="jenisPaket" class="form-label" >Jenis Paket</label>
                    <select class="form-select" aria-label="Default select example" name="jenisPaket" id="jenisPaket" onchange="harga()" required>
                        <?php
                            $paket = array("Paket Santuy", "Paket Normal", "Paket Buruan Kuy");
                            foreach($paket as $p) {
                                if($p == $data['jenisPaket']) {
                                    echo "<option selected='selected' value='$p'>$p</option>";
                                } else {
                                    echo "<option value='$p'>$p</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <script type="text/javascript">
                    function harga() {
                        var select = document.getElementById("jenisPaket").value;
                        if(select == "Paket Santuy") {
                            document.getElementById("hargaPaket").value = 100000;
                        } else if(select == "Paket Normal") {
                            document.getElementById("hargaPaket").value = 200000;
                        } else if(select == "Paket Buruan Kuy") {
                            document.getElementById("hargaPaket").value = 300000;
                        }
                    }
                </script>
                <div class="mb-3">
                    <label for="hargaPaket" class="form-label" >Harga Paket</label>
                    <input type="text" class="form-control" name="hargaPaket" id="hargaPaket" readonly value="<?php echo $data['hargaPaket'] ?>"/>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
                </div>
                </form>
            </div>
        </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
