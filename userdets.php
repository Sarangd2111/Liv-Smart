<?php
include('login.php');
if(mysqli_num_rows($rs)==1){
    $user = $row['username'];
    $name = $row['name'];
}
?>