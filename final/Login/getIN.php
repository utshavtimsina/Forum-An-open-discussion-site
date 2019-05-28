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

$pwdfocus = '';
$emailfocus = '';

if (isset($_GET['email'])) {
	$email = $_GET['email'];
	$pwdfocus = 'autofocus';
}else{
	$email = '';
	$emailfocus = 'autofocus';
}

include('server.php') ;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="forum.css">
<title>KCC FORUM</title></head>
<body>
<br>
<div class="LOGIN">
<h1 id="heading">Forum Login</h1>
<hr>
<form method="post" action="getIN.php">
<?php include('errors.php'); ?>
<input type="email"  class="form" placeholder="Enter Email" value="<?php echo $email ?>" name="email" required="" <?php echo $emailfocus ?>><br><br>
<input type="password"  class="form" placeholder="password" name="password" required  <?php echo $pwdfocus ?>><br><br>
<label style="font-size: 15px; cursor: pointer;"><input type="checkbox"  name="remember">Keep me logged in</label><br><br>
<input type="submit" class="button"value="getIN" name="getIN">
<h1 id="OR">OR</h1>
</form>
<form action="register.php">
<input type="submit" class="button" value="newUSER">
</form>
</div>
</body>
</html>