<?php
session_start();
include_once '../include/config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:index.php');
  }

//   shyari
    $sql = "SELECT * FROM shayari";
	$result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    
//   post shyari 
$post = "SELECT * FROM table_text";
$results = mysqli_query($con, $post);
$nums = mysqli_num_rows($results);

//   image shyari 
$imgs = "SELECT * FROM `image`";
$resul = mysqli_query($con, $imgs);
$img = mysqli_num_rows($resul);

//   image shyari 
$users = "SELECT * FROM `users`";
$resu = mysqli_query($con, $users);
$user = mysqli_num_rows($resu);


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
                 <div class="card">
                    <div class="card_title">
                         <span><i class="fas fa-icons"></i></span>
                         <p>SHAYARI TABLES</p>
                         <h1><?php echo $num ?></h1>
                    </div>
                    <div class="card_title">
                         <span><i class="fas fa-text-height"></i></span>
                         <p>POST SHAYARI</p>
                         <h1><?php echo $nums ?></h1>
                    </div>
                    <div class="card_title">
                         <span><i class="far fa-image"></i></span>
                         <p>POST IMAGES</p>
                         <h1><?php echo $img?></h1>
                    </div>
                    <div class="card_title">
                         <span><i class="fas fa-users-cog"></i></span>
                         <p>AUTHORS</p>
                         <h1><?php echo $user?></h1>
                    </div>

                 </div>
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