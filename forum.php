<?php
  session_start();
  include('connection.php');
  // include('userdets.php');
  $name = $_SESSION['name'];
  $sql = "SELECT * FROM `forum`";
?>


<?php
    function send_message(){
          // if(isset($_SESSION['name'])){
            
            $isnull = is_null($_POST['message']);
            if(!$isnull){
              $message = $_POST['message'];
              $date=date("Y-m-d");
              $time=date("Y-m-d H:i:s");
              $msg = "INSERT INTO `forum` VALUES('','$name', '$date', '$time', '$message')";
              $send = mysqli_query($con, $msg); 
              // $msg1 = "SELECT * FROM `forum` ORDER BY `id` DESC LIMIT 1";
              // $fetch = mysqli_query($con, $msg1); 
            }
            // <script> document.getElementById("message").value = ''; </script>
          }
        // }
        
      ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./about.css">
  <link rel="stylesheet" href="./forum.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/favicon-removebg-preview.png" style="height:60px;width:60px">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
  <title>LivSmart</title>
</head>

<body>
  <section id="forum">
    <div class="navback">
      <div class="title">
        <img src="./Images/favicon-removebg-preview.png" alt="" style="width: 80px; height: 80px;">
        Liv-Smart
      </div>
      <a href="./index1.html"> <img class="back" src="./Images/back.png" alt="" width="56px"></a>
    </div>
    <?php   
  //   while(true){ 
  $allchat = mysqli_query($con, $sql);
  // sleep(5);?>
    <div class="chat">
      <?php 
            while($row = mysqli_fetch_assoc($allchat)){ 
            if($row['name'] == $name){
      ?>
      <div class="rightchatbubble">
        <div class="chatdets"> <div class="username"><?php echo $row['name']; ?></div> <div class="time"><?php echo $row['time']; ?></div></div>
        <p><?php echo $row['chat']; ?></p>
      </div>
      <?php 
        } else {
      ?>

      <div class="leftchatbubble">
      <div class="chatdets"> <div class="username"><?php echo $row['name']; ?></div> <div class="time"><?php echo $row['time'];?></div></div>
        <p><?php echo $row['chat']; ?></p>
       </div>
      <?php 
          } 
        }
      // }
      ?>
    </div>

    <div class="lower">
      <div class="chatinput">
        <div class="emote">
         <button class="emotes"><img src="./Images/happiness.png" alt="" width="26px"></button> 
        </div>
        <form action="forum.php" method="POST">
        <div class="input">
          <input type="text" name="message" id="message">
        </div>
        <div class="send">
          <button type="submit" onclick="send_message()" class="send" value="submit"><img src="./Images/send5.png" alt="" width="32px"></button>
        </div>
        </form>
      </div>
    </div>
  </section>


</body>
</html>


