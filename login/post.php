<?php
session_start();
include_once '../include/config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location:index.php');
  }
  
//   shayari table create
  if (isset($_POST['submit_create']) && $_SERVER["REQUEST_METHOD"] == "POST") {

	$table = mysqli_real_escape_string($con, $_POST['table']);
    $sql = "SELECT * FROM shayari WHERE shayari_name ='$table'";
    $result = mysqli_query($con,$sql);
    $numrows = mysqli_num_rows($result);
  
       if($numrows>0){
            echo '<script>alert("Error! shayari already exists.")</script>';
       }else{
            $sql = "INSERT INTO `shayari` (`shayari_name`) VALUES ('$table')";
            $result = mysqli_query($con,$sql);
    if($result){
        echo '<script>alert("Successfully! create table .")</script>';
     }

  }

}

if (isset($_POST['submits']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $text = mysqli_real_escape_string($con, $_POST['sayari_text']);
	$cid = mysqli_real_escape_string($con, $_POST['sayari_name']);
    $text_save = trim($text);
    $sql = "INSERT INTO `table_text` (`shayari_name`, `cid`) VALUES ('$text_save', '$cid')";
    $result = mysqli_query($con,$sql);
    
       if($result){
           echo '<script>alert("Successfully! Shayari Add .")</script>';
        }else{
           echo '<script>alert("Error! Shayari Not Add.")</script>';
    }

}
// img post
if (isset($_POST['imgsubmit'])) {

	$files = $_FILES['file'];
	$filename = $files['name'];
	$fileerror = $files['error'];
	$filetmp = $files['tmp_name'];

	$fileext = explode('.', $filename);
	$filecheck = strtolower(end($fileext));

	$fileextloade = array('png', 'jpg', 'jpeg');

	if (in_array($filecheck, $fileextloade)) {
		$path = 'upload/';
		$uploadfilename = $path . $filename;
		move_uploaded_file($filetmp, $uploadfilename);

		$sql = "INSERT INTO `image` (`img`) VALUES ('$uploadfilename');";

		$result = mysqli_query($con, $sql);
		if ($result) {
			echo "<script>alert(\"Data insert successfully.\")</script>";
		} else {
			echo "<script>alert(\"Server Problems.\")</script>";
		}

	} else {
		echo "<script>alert(\"data not upload Please change file\")</script>";
	}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <section class="home_page">
        <nav><?php include_once '_nav.php' ;?></nav>
        <header class="header">
            <nav><?php include_once '_home.php' ;?></nav>
            <main class="main">
                <div class="button_class">
                    <button id="btn1" onclick="btntext()">TEXT POST</button>
                    <button id="btn2" onclick="btnimage()">IMAGE POST</button>
                </div>
                <hr>
                <section class="post">
                    <div class="content" id="content1">
                        <div class="post">
                            <h2>POST / <?php echo "Sayari"?></h2>
                            <div class="form_group">
                                <form method="POST">
                                    <div class="control">
                                        <label for="validationCustom02">Choose Sayari & Show Sayari</label>
                                        <select class="custom-select" id="validationCustom02" required
                                            name="sayari_name">
                                            <option selected disabled value="">Choose...</option>
                                            <?php
          // Choose query in php 
           $sql = "SELECT * FROM shayari";
           $result = mysqli_query($con,$sql);
           while($rows = mysqli_fetch_assoc($result)){
               ?>
                                            <option class="border border-warning" value="<?php echo $rows['id'];?>">
                                                <?php echo $rows['shayari_name'];?></option>
                                            <?php
           }
          
          ?>
                                        </select>
                                    </div>
                                    <div class="control">
                                        <label for="exampleFormControlTextarea1">You can write shayari here</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                            id="exampleFormControlTextarea1" required name="sayari_text"></textarea>
                                    </div>
                                    <div class="control">
                                        <button class="btn" type="submit" name="submits">Post form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="content" id="content2">
                        <div class="post">
                            <h2>POST / <?php echo "IMAGE"?></h2>
                            <div class="form_group">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="control">
                                    <input type="file" accept="image/*" placeholder ="image upload" required name="file">
                                    </div>
                                    <div class="control">
                                        <button class="btn" type="submit" name="imgsubmit">Post form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <div class="copyright">
                <p>Copyright <span>&#169;</span> <span><?php echo date("Y") ?></span> babatech.com All rights reserved.
                </p>
            </div>
        </header>
        <div class="add_login">
            <button onclick="location.reload()"><i class="fas fa-sync-alt"></i></button>
            <button class="open" onclick="myfun()"><i class="fas fa-arrow-circle-left"></i></button>
            <div class="puse_table" id="puse_table">
                <form method="POST">
                    <input type="text" name="table" id="show" placeholder="Create Table" required autocomplete="off"
                        autofocus>
                    <button id="create" type="submit" name="submit_create"><i class="fas fa-plus"></i></button>
                </form>
            </div>
        </div>
    </section>
    <script src="index.js"></script>
</body>

</html>