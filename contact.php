<?php 

include('connection.php');
    // $con = mysqli_connect('localhost', 'root','', 'livsmart');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['telephone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` VALUES ('$name','$email','$mobile','$message')";
    $rs = mysqli_query($con, $sql);

    if($rs){
        ?>
        <script>alert('Sent it by the fastest ways....')</script>
        <?php
    }
?>