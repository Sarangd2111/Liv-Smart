<?php 
    $con = mysqli_connect('localhost', 'root','', 'livsmart');

    if(mysqli_connect_error()){
        echo ("Failed to connect") .mysqli_connect_error();
    }
?>

