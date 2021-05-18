<?php
session_start();
include_once '../include/config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard <?php echo basename('Home', ".php") ?></title>
    <link rel="stylesheet" href="../scss/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="home_page">
        <nav><?php include_once '_nav.php' ;?></nav>
        <header class="header">
             <nav><?php include_once '_home.php' ;?></nav>
             <main class="main" style="background-color:transparent;">
                 <!-- add block function start -->
                 <!-- https://www.banuba.com/video-editor-sdk -->
                 <!-- https://www.banuba.com/technology/background-subtraction -->


              <!-- add block function end -->
             </main>
             <div class="copyright">
                 <p>Copyright <span>&#169;</span> <span><?php echo date("Y") ?></span> babatech.com All rights reserved.</p>
             </div>
        </header>
        <div class="add_login">
        <button onclick="location.reload()"><i class="fas fa-sync-alt"></i></button>
        </div>
    </section>
    <script src="index.js"></script>
</body>
</html>
