<?php include('server.php') ?>
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
<input type="text"  class="form" placeholder="userID" name="userId" required=""><br><br>
<input type="password"  class="form" placeholder="password" name="password" required=""><br><br>
<input type="submit" class="button"value="getIN" name="getIN">
<h1 id="OR">OR</h1>
</form>
<form action="register.php">
<input type="submit" class="button" value="newUSER">
</form>
</div>
</body>
</html>