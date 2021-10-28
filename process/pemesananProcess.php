<?php
    session_start();
    if(!isset($_SESSION['isLogin'])) {
        echo 
        '<script>
            alert("Login Terlebih Dahulu Sebelum Memesan!!!"); window.location = "../page/login.php"
        </script>';
    } else {
        if(isset($_POST['process']) || isset($_POST['pesananProcess']) ) {
            include('../db.php');
    
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $noHp = $_POST['noHp'];
            $jenisPaket = $_POST['jenisPaket'];
            $hargaPaket = $_POST['hargaPaket'];
    
            $query = mysqli_query($con,
                "INSERT INTO pemesanan(nama, email, noHp, hargaPaket, jenisPaket)
                    VALUES
                ('$nama', '$email', '$noHp', '$hargaPaket', '$jenisPaket')")
                    or die(mysqli_error($con));
    
                    if($query) {
                        if(isset($_POST['process'])) {
                            echo
                            '<script>
                            alert("Create Data Success"); window.location = "../page/pemesanan.php"
                            </script>';
                        } else if(isset($_POST['pesananProcess'])) {
                            echo
                            '<script>
                            alert("Create Data Success"); window.location = "../page/admin.php"
                            </script>';
                        }
                    } else {
                        echo
                            '<script>
                            alert("Create Data Failed");
                            </script>';
                    }
            
        } else {
            echo
                '<script>
                    window.history.back()
                </script>';
        }
    }
?>