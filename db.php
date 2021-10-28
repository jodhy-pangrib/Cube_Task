<?php
    $host = "sql104.epizy.com";
    $user = "epiz_30105626";
    $pass = "05XVUR1FvJJ";
    $name = "epiz_30105626_proyek_uts";

    $con = mysqli_connect($host,$user,$pass,$name);

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL : " . mysqli_connect_errno();
    }
?>