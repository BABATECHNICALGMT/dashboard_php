<?php
include_once '../include/config.php';
$msg = '';
if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

	echo $admin = mysqli_real_escape_string($con, $_POST['admin']);
	echo $lock = mysqli_real_escape_string($con, $_POST['pass']);

    

	$sql = "SELECT * FROM users WHERE `name` = '$admin' AND `password` = '$lock'";
	$result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
     
	if ($num == 1) {
        session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['admin'] = $admin;
		header('location:dashboard.php');
	} else {
		$msg = "Password do not match";
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../scss/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body oncontextmenu="return true">
    <section class="section">
        <div class="main_center">
            <h2 class="before">Quotes Pro App Dashboard</h2>
            <hr>
            <div class="form_div">
                <form method="POST">
                    <div class="display">
                        <div class="icon" ><i class="fas fa-user"></i></div>
                        <input type="text" placeholder="admin" name="admin" id="admin" autofocus required autocomplete="off">
                    </div>
                    <div class="display">
                        <div class="icon"><i class="fas fa-key"></i></div>
                        <input type="password" placeholder="Password" id="password" name="pass" autofocus required autocomplete="off">
                    </div>
                    <div class="subbtn">
                        <input type="submit" name="submit" class="login" value="Login">
                    </div>
                </form>

                <h3 align="left" ><?php echo $msg ?></h3>
            </div>
        </div>
        <div class="add_login">
            <a href="post_login.php" >Post Login</a>
        </div>
    </section>
    
</body>

</html>