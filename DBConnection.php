<?php
    $server="localhost";
    $root="root";
    $pass="";
    $dbname="osms";

    $conn=mysqli_connect($server,$root,$pass,$dbname);

    if(!$conn){
        echo  '<div class="alert alert-success mt-2" role="alert"> Connection Failed </div>';
    }

?>