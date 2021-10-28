<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id= $_GET['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $noHp = $_POST['noHp'];
        $jenisPaket = $_POST['jenisPaket'];
        $hargaPaket = $_POST['hargaPaket'];

        $query = mysqli_query($con,
            "UPDATE pemesanan SET nama = '$nama', email = '$email', noHp = '$noHp', jenisPaket = '$jenisPaket', hargaPaket = '$hargaPaket'
                WHERE id = '$id'")
                or die(mysqli_error($con));

        if($query) {
            echo
                '<script>
                alert("Edit Data Success"); window.location = "../page/admin.php"
                </script>';
        } else {
            echo
                '<script>
                alert("Edit Data Failed");
                </script>';
        }

    } else {
        '<script>
        window.history.back()
        </script>';
    }
?>