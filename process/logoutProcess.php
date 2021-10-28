<?php
    ob_start();
    session_start();
    session_destroy();
    echo
        '<script>
            alert("Logout Success"); window.location = "../page/login.php"
        </script>';
?>