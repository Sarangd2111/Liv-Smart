<?php

// if(isset($_POST['login'])){
include('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM  `account` WHERE `username` = '$username' AND `password`='$password'";

$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs)==1){
    $row = mysqli_fetch_assoc($rs);
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name'];

    setcookie('username',$row['username'], time() + 3600,'/' );

    $temp = "INSERT INTO `tempuser` VALUES ('".$row['name']."', '$username', '".$row['email']."', '".$row['mobile']."')";
    $temp_query = mysqli_query($con, $temp);
    header('location:index1.html');
}
else{
    ?>
    <script>alert('Ahh....unknown to us....');</script>
    <?php
}
// }
?>