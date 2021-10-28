<?php
    if(isset($_POST['confirm'])){
        include('../db.php');
        
        $id= $_GET['id'];
        $password = $_POST['password'];
        $password2 = $_POST['newPassword'];
        $password3 = $_POST['confirmPassword'];

        $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
        $user = mysqli_fetch_assoc($query);
        if(password_verify($password, $user['password'])) {
            if($password2 != $password3) {
                echo
                    '<script>
                    alert("Confim Password Salah!!"); window.location = "../page/editProfil.php"
                    </script>';
            } else {
                $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $query = mysqli_query($con,
                    "UPDATE users SET password = '$newPassword'
                        WHERE id = '$id'")
                        or die(mysqli_error($con));
    
                if($query) {
                    echo
                        '<script>
                        alert("Edit Password Success"); window.location = "../page/profil.php"
                        </script>';
                } else {
                    echo
                        '<script>
                        alert("Edit Password Failed");
                        </script>';
                }
            }
        } else {
            echo
                '<script>
                    alert("Password Invalid");
                    window.location = "../page/editProfil.php"
                </script>';
        }

    } else {
        '<script>
        window.history.back()
        </script>';
    }
?>