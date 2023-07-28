<?php
      include('connection.php');    

      // if(isset($_POST['signup'])){
      
            $name = $_POST['name'];
            $username = $_POST['username'];
            $age = $_POST['age'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $acc_chk = "SELECT * FROM `account` WHERE `username` = '$username'";
            $chk = mysqli_query($con, $acc_chk);

            if(mysqli_num_rows($chk)==0){
                  $sql = "INSERT INTO `account` VALUES('$name','$username', '$age', '$mobile', '$email', '$password')";
                  $rs = mysqli_query($con, $sql);

                  header('location:login.html');
            }
            else{
                  ?>
                   <script>alert('Username taken...try with some other options...')</script>
                  <?php
            }
      // }
?>
