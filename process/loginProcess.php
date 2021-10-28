<?php
    if(isset($_POST['submit'])) {
        session_start();
        include ('../db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($con));
        if($username == "admin" && $password == "admin") {
            $_SESSION['isLogin'] = true;
            $_SESSION['user'] = "admin";
            echo
            '<script>
                alert("Selamat Datang, Admin :)"); window.location = "../page/admin.php"
            </script>';
        } else {
            if(mysqli_num_rows($query) == 0) {
                echo
                '<script>
                    alert("Username not found!"); window.location = "../page/login.php"
                </script>';
            } else {
                $user = mysqli_fetch_assoc($query);
                if(password_verify($password, $user['password'])){
                    $verifikasi = $user['verifikasi'];
                    if($verifikasi==1) {
                        $_SESSION['isLogin'] = true;
                        $_SESSION['user'] = $username;
                        echo
                        '<script>
                            alert("Login Success"); window.location = "../index.php"
                        </script>';
                    } else {
                        echo
                        '<script>
                            alert("Akun belum diverifikasi"); window.location = "../page/login.php"
                        </script>';
                    }
                }else {
                    echo
                        '<script>
                            alert("Password Invalid");
                            window.location = "../page/login.php"
                        </script>';
                }
            }
        }
    } else {
        echo
            '<script>
                window.history.back()
            </script>';
    }
?>