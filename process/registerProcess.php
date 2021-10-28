<?php
    if(isset($_POST['register'])) {
        include('../db.php');
        include('../sendMail.php');

        $email = strtolower(stripslashes($_POST['email']));
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Generate Token
        $token = md5(time().$username);

        $result1 = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
        $result2 = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result1)) {
            echo
            '<script>
                alert("Email sudah terdaftar!");
                window.history.back();
            </script>';
        } else if( mysqli_fetch_assoc($result2)) {
            echo
            '<script>
                alert("Username sudah terdaftar!");
                window.history.back();
            </script>';
        } else {
            $query = mysqli_query($con,
            "INSERT INTO users(email,username,password,token)
                VALUES
            ('$email', '$username', '$password', '$token')")
                or die(mysqli_error($con));
            send($email,$token);
            if($query) {
                echo
                '<script>
                    alert("Register Success. We have sent a verification to the address provided."); window.location = "../page/login.php"
                </script>';
            } else {
                echo
                '<script>
                    alert("Register Failed");
                </script>';
            }
        }
    } else {
        echo
        '<script>
            window.history.back();
        </script>';
    }
?>