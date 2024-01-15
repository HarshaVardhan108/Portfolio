<?php
    $server = "localhost";

    $username = "root";

    $password = "";
    $con = mysqli_connect($server, $username, $password);
    if(!$con){echo "Success connecting to the db";}
?>
