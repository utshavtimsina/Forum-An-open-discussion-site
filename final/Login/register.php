<?php 
session_start();

if (isset($_COOKIE['remember'])) {
	$_SESSION['uid'] = $_COOKIE['uid'];
	$_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['profile_pic'] = $_COOKIE['profile_pic'];
}

if (isset($_SESSION['uid'])) {
	header('location:../index.php');
}

include('server.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title>REGISTER</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<br>
<div class="register">
<h1 id="heading">REGISTRATION</h1><hr>
<form method="post" action="register.php">
<?php include('errors.php'); ?>
<input type="username"  class="form" placeholder=" Enter Your Name" name="username" required="" autofocus><br><br>
<input type="email"  class="form" placeholder=" Enter Your Email" name="email" required=""><br><br>
<input type="password"  class="form" placeholder="type in your password" name="pass1" required=""><br><br>
<input type="password"  class="form" placeholder="confirm password" name="pass2" required=""><br><br>
<input type="submit" class="button"value="Register" name="register">
</div>
</body>
</html>
