<?php include('server.php') ?>
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
<input type="text"  class="form" placeholder=" create a userID" name="user" required="">
<br><br>
<input type="password"  class="form" placeholder="type in your password" name="pass1" required=""><br><br>
<input type="password"  class="form" placeholder="confirm password" name="pass2" required=""><br><br>
<input type="submit" class="button"value="Register" name="register">

</form>
</div>
</body>
</html>
